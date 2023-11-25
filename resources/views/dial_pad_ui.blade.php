
<br/> <br />

<div class="container">
    <div class="row" id="dialed-input">
        <div class="col-12">
            <input type="number" maxlength="10">
        </div>
    </div>
    <!--row-end-->

    <form action="/api/contact" method="POST" x-data="contactForm()" @submit.prevent="submitData">
        @csrf

        <div class="row" id="dial-pad">

            <div class="col-4 num">
                <h2>1</h2>
            </div>
            <!--col-4 end-->

            <div class="col-4 num">
                <h2>2</h2>
                <span>ABC</span>
            </div>
            <!--col-4 end-->

            <div class="col-4 num">
                <h2>3</h2>
                <span>DEF</span>
            </div>
            <!--col-4 end-->

            <div class="col-4 num">
                <h2>4</h2>
                <span>GHI</span>
            </div>
            <!--col-4 end-->

            <div class="col-4 num">
                <h2>5</h2>
                <span>JKL</span>
            </div>
            <!--col-4 end-->

            <div class="col-4 num">
                <h2>6</h2>
                <span>MNO</span>
            </div>
            <!--col-4 end-->

            <div class="col-4 num">
                <h2>7</h2>
                <span>PQRS</span>
            </div>
            <!--col-4 end-->

            <div class="col-4 num">
                <h2>8</h2>
                <span>TUV</span>
            </div>
            <!--col-4 end-->

            <div class="col-4 num">
                <h2>9</h2>
                <span>WXYZ</span>
            </div>
            <!--col-4 end-->

            <div class="col-4">
                <h2>*</h2>
            </div>
            <!--col-4 end-->

            <div class="col-4 num">
                <h2>0</h2>
                <span>+</span>
            </div>
            <!--col-4 end-->

            <div class="col-4">
                <h2>#</h2>
            </div>
            <!--col-4 end-->

            <div class="col-4">
                <h2><i class="fa fa-comment"></i></h2>
            </div>
            <!--col-4 end-->

            <div class="col-4" id="call-btn" type="submit">
                <button><i class="fa fa-phone"></i></<button>
            </div>
            <!--col-4 end-->

            <div class="col-4" id="del-btn">
                <h2><i class="fa fa-times"></i></h2>
            </div>
            <!--col-4 end-->

            {{-- <button class="bg-gray-700 hover:bg-gray-800 text-white w-full p-2">Submit</button> --}}


        </div>

        <p x-text="message"></p>

    </form>
    <!--row-end-->


    <div id="modal">
        <button id="close"><i class="fa fa-times"></i></button>
        <i class="fa fa-phone"></i>
        <span id="message"></span>
    </div>

</div>
<!--container-end-->
