@extends('frontend')

@section('content')

    <section class="section fix">
        <div class="layout-home">
            <div class="col-left">
                <!-- BoxContact -->
                <div class="box-contact cf">
                    <div class="area-contact">
                        <div class="title">
                            <h3 class="global-title">
                                <a href="{{url('lien-he')}}">Liên hệ</a>
                            </h3>
                        </div>
                        <div class="area-contact cf">
                            {!! Form::open(array('url' => 'save_question')) !!}
                                <input type="text" name="ask_person" class="txt txt-name" placeholder="Họ và tên"/>
                                <input type="email" name="ask_email" class="txt txt-email" placeholder="Email"/>
                                <input type="number" name="ask_phone" class="txt txt-phone" placeholder="Số điện thoại"/>
                                <input type="text" name="ask_address" class="txt txt-add" placeholder="Địa chỉ"/>
                                <textarea name="question" class="txt txt-content" placeholder="Nội dung"></textarea>
                                <input type="submit" value="gửi đi" class="btn btn-submit"/>
                                <input type="reset" value="Làm lại" class="btn btn-reset"/>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <div class="boxMap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14898.483493048278!2d105.8014624!3d21.007829299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab5a02fbb0f5%3A0x75b5e966c9fb8bc0!2zQ8O0bmcgdHkgVE5ISCBUdeG7hyBMaW5o!5e0!3m2!1svi!2s!4v1441615369587" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                <!-- EndBoxContact -->
            </div><!--//col-left-->
            @include('frontend.right')
            <div class="clear"></div>
        </div><!--//layout-home-->
        <div class="clear"></div>
    </section>

@endsection
