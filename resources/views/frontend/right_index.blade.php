<div class="col-right">
    <div class="box-adv">
        <a href="#">
            <img src="{{url('frontend/images/tuvan_300_72.jpg')}}" alt="Tổng đài">
        </a>
    </div>
    @if ($featureVideos->count() > 0)
        <div class="box-video">
            @if ($firstVideo = $featureVideos->shift())
                <div class="data">
                    <iframe width="100%" height="250" src="{{$firstVideo->url}}" frameborder="0" allowfullscreen></iframe>
                    <h3 class="titleVideo">
                      <a href="{{url('video', $firstVideo->slug)}}">{{$firstVideo->title}}</a>
                    </h3>
                    <span class="view">{{$firstVideo->views}} lượt xem</span>
                </div>
            @endif
            @if ($featureVideos->count() > 0)
                @foreach ($featureVideos as $video)
                    <div class="item cf">
                        <a href="#" class="thumbs">
                            <img src="{{url('img/cache/105x69/'.$video->image)}}" alt="">
                        </a>
                        <h3>
                            <a href="{{url('video/'.$video->slug)}}">{{$video->title}}</a>
                        </h3>
                        <span class="view">{{$video->views}} lượt xem</span>
                    </div>
                @endforeach
             @endif
        </div>
    @endif
    <div class="box-consult cf">
        <article class="item">
            <a href="" title="">
                <img src="{{url('frontend/images/tuvan02.jpg')}}" width="306" height="134" alt="" class="thumbs">
            </a>
            <h3>
                <a href="" title="">
                    Tổng đài: 0912571190</a></h3>
        </article></div>
    <div class="box-contact">
        <h3>Đặt câu hỏi với chuyên gia</h3>
        <div class="col-right">
            {!! Form::open(array('url' => 'save_question')) !!}
                <input type="text" name="ask_person" class="txt txt-name" placeholder="Họ và tên"/>
                <input type="email" name="ask_email" class="txt txt-email" placeholder="Email"/>
                <input type="number" name="ask_phone" class="txt txt-phone" placeholder="Số điện thoại"/>
                <input type="text" name="ask_address" class="txt txt-add" placeholder="Địa chỉ"/>
                <textarea name="question" class="txt txt-content" placeholder="Nội dung"></textarea>
                <input type="submit" value="gửi đi" class="btn btn-submit"/>
                <span class="mail-name">contact@tuelinh.com</span>
            {!! Form::close() !!}
        </div>
    </div>
</div><!--//col-right-->