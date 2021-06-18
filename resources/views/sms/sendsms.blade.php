@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('sms.sendsms') }}">Send SMS</a>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Send SMS</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('sms.process') }}" id="smsform" onsubmit="return false">
                            <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            {{-- {{ csrf_field() }} --}}
                            
    
                            <div class="form-group">
                                <label for="sender" class="col-md-4 control-label">Sender ID</label>
    
                                <div class="col-md-6">
                                    <input id="senderid" type="text" class="form-control" name="senderid">
                                    <input id="pagecount" type="hidden" class="form-control" name="pagecount">
                                    <span class="text-danger" id="senderidError"></span>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="recipient" class="col-md-4 control-label">Recipient ID</label>
                                <div class="col-md-6">
                                <textarea name="recipientid[]" placeholder="Please type number(s), seperated by comma" id="recipientid" class="form-control" cols="30" rows="5"></textarea>
                                <span class="text-danger" id="recipientidError"></span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="recipient" class="col-md-4 control-label">Message Body</label>
                                <div class="col-md-6">
                                <textarea name="message" placeholder="message" id="message" class="form-control" cols="30" rows="5"></textarea>
                                <span id="messageCounter"></span>
                                <span class="text-danger" id="messageError"></span>
                                
                                </div>
                            </div>
    
    
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4 text-center">
                                    <button type="submit" id="sendSMS" class="btn btn-primary">
                                        Send SMS
                                    </button>
    
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
         let maximumLength = 160;
        let otherLength = 154;
        var page = 1;
        let allPage = 0;
        let currentLength;
        let nextLength = 0;
        let length;
        $(document).ready(function () {
            $('#message').keyup(function (e) { 
                currentLength = $(this).val().length;
                length = maximumLength - currentLength
                
                if(currentLength <= maximumLength){                   
                    $('#messageCounter').text("Page: "+page+ ", Character left: "+length + ", Total Typed Character: "+ currentLength);
                    $('#pagecount').val(page);
                }else {

                    nextLength = currentLength - maximumLength;
                    finalLength = otherLength - nextLength;
                    $('#messageCounter').text("Page: "+ Math.ceil(currentLength / otherLength)  +", Character left: "+ (3+((otherLength - 1) * Math.ceil(currentLength/otherLength))-currentLength) + ", Total Typed Character: "+ currentLength);   
                    $('#pagecount').val(Math.ceil(currentLength / otherLength));
                }
                
                            
                    
            });
        });

         $('form#smsform').submit(function(){
            var senderid = $('#senderid').val();
            var recipientid  = $('#recipientid').val();
            var pagecount  = $('#pagecount').val();
            var message  = $('#message').val();            
            var _token = $('#_token').val();
            var status = "";

            if(senderid == ""){
                $('#senderidError').html('Sender ID cannot be empty');
                status = true;
            }else if(senderid.length < 3){
                $('#senderidError').html('Sender ID must be between 3 and 11 characters');
                status = true;
            }else if(senderid.length > 11){
                $('#senderidError').html('Sender ID must be between 3 and 11 characters');
                status = true;
            }else{
                $('#senderidError').html(" ");
            }

            let regCharacters =  /(\s+.*[\^°<>#*~!"§$%?®©¶]+.*\s+|\s+.*\s+.*[\^°<>#*~!"§$%?®©¶]+|[\^°<>#*~!"§$%?®©¶]+.*\s+.*\s+)/;

            if(recipientid == ""){
                $('#recipientidError').html('Recipient ID cannot be empty');
                status = true;
            }else if(regCharacters.test(recipientid)){
                $('#recipientidError').html('Recipient ID cannot contains special characters');
                status = true;
            }else{
                $('#recipientidError').html(" ");
            }

            if(message == ""){
                $('#messageError').html('Message body cannot be empty');
                status = true;
            }else{
                $('#messageError').html(" ");
            }
            
            if(status != true){
                // console.log(recipientid.replaceAll(" ", '').split(','));
                // let recipientNumbers = recipientid.replaceAll(" ", '').split(',');                
                // console.log(strisstr()recipientNumbers);
                
                var data = {'message': message, 'recipientid': recipientid, 'pagecount' : pagecount, 'senderid': senderid, '_token': _token,}
                console.log(data);
                $('#sendSMS').attr('disabled', true);
                $('#sendSMS').text('processing...');
                $.ajax({
                    url: "{{route('sms.process')}}",
                    type: 'POST',
                    data: data,
                    dataType: 'JSON',
                    success:function(data){
                        console.log(data)

                        if(confirm("You are sending "+data.pagecount+" pages of SMS to " + data.totalReceipient + " recipients \n" + "Total amount charge is "+ data.totalPrice)){
                            alert('go');
                            $('#sendSMS').attr('disabled', false);
                            $('#sendSMS').text('send SMS');
                        }else{
                            alert('sms cancel');
                            $('#sendSMS').attr('disabled', false);
                            $('#sendSMS').text('send SMS');
                        }
                        
                    },
                    error:function(xhr, status, error){
                        console.log(error)
                    }
                });
            }
                       
        });
       
        
    </script>
@endsection
