
@extends('layouts.base')


@section('content')

<div class="body-wrapper">
<section class="cfs-form innerpage">
    <div class="inner-container">
        <div class="intro">
            <h2>CORPORATE SALES ENQUIRY</h2>
            <div class="intro-title grey">Estimate your monthly budget by using the tools below.</div>
        </div>

        <div class="stage-contained">    
            <div class="form-section">
                <div class="sec-title black">1. COMPANY DETAILS</div>
                <ul class="form-item">
                    <li>
                        <div class="select-title">REGISTERED COMPANY NAME</div>
                        <div class="input-box">
                            <input type="text" name="model" class="input-text"></div>
                        <div class="error-message red"></div>  
                    </li>

                    <li>
                        <div class="select-title">ADDRESS</div>
                        <div class="input-box">
                            <input type="text" name="aggress" class="input-text error" placeholder="Company address"></div>
                        <div class="error-message red">Error message</div>  
                    </li>

                    <li>
                        <div class="half">
                            <div class="select-title">Postcode</div>
                            <div class="input-box">
                                <input type="number" name="postcode" class="input-text" placeholder="Postcode">
                            </div>   
                        </div>      
                        
                        <div class="half">
                            <div class="select-title">Town</div>
                            <div class="input-box">
                                <input type="text" name="town" class="input-text" placeholder="Town">
                            </div>   
                        </div>    
                        <div class="clearfix"></div>
                    </li>
                </ul>
            </div>

            <div class="form-section">
                <div class="sec-title black">2. YOUR CONTACT DETAILS</div>
                <ul class="form-item">
                    <li>
                        <div class="select-title">NAME</div>
                        <div class="input-box">
                            <input type="text" name="model" class="input-text" placeholder="Your name"></div>
                        <div class="error-message red"></div>  
                    </li>

                    <li>
                        <div class="select-title">EMAIL</div>
                        <div class="input-box">
                            <input type="text" name="aggress" class="input-text" placeholder="Name@company.com"></div>
                    </li>

                    <li>
                        <div class="select-title">CONTACT NO.</div>
                        <div class="input-box">
                            <input type="number" name="postcode" class="input-text hp"><span class="hp-front">+60</span>
                        </div>                             
                    </li>                    
                </ul>
            </div>

            <div class="btn-container">
                <a href="#" class="prime-cta-black">
                <span>SEND ENQUIRY</span>
                <div class="overlay"></div>
                </a>
                <div class="clearfix"></div>
            </div>

            <div class="note cfs-note">By clicking "Send Enquiry”, you have read the <a href="">Personal Data Protection Agreement</a> and consent to Honda Malaysia Sdn. Bhd. (including its authorised dealers) processing my personal data in accordance with the Personal Data Protection Agreement. </div>


        </div>
    </div>

</section>



</div>

@stop

