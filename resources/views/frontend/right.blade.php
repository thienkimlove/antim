<div class="col-right">
<div class="box-adv">
        <a href="#">
            <img src="{{url('frontend/images/tuvan_300_72.jpg')}}" alt="Tổng đài">
        </a>
    </div>
    @if ($featureVideos->count() > 0)
        <div class="box-video">
            <h3 class="global-title"><a href="{{url('video')}}">Góc videos</a></h3>
            @if ($firstVideo = $featureVideos->shift())
                <div class="data">
                    <iframe width="100%" height="315" src="{{$firstVideo->url}}" frameborder="0" allowfullscreen></iframe>
                </div>
            @endif
            @if ($featureVideos->count() > 0)
                <ul class="listVideo">
                    @foreach ($featureVideos as $video)
                      <li><a href="{{url('video/'.$video->slug)}}">{{$video->title}}</a></li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
    @foreach ($rightBanners as $banner)
        <div class="box-adv">
            <a href="{{$banner->url}}">
                <img src="{{url('files/'.$banner->image)}}" alt="Tue linh">
            </a>
        </div>
    @endforeach
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
        <div class="Social">
            <div class="fb-page" data-href="https://www.facebook.com/antim.vn" data-width="300"
                 data-small-header="false" data-adapt-container-width="true" data-hide-cover="false"
                 data-show-facepile="true">
                <blockquote cite="https://www.facebook.com/antim.vn" class="fb-xfbml-parse-ignore"><a
                            href="https://www.facebook.com/antim.vn">An tim Tuệ Linh</a>
                </blockquote>
            </div>
        </div>

    @if ($rightNews && isset($page) && $page != 'phan-phoi' && $page != 'lien-he')
    <div class="boxHot cf" id="sidebar">
        <h3 class="global-title"><a href="{{url('tin-tuc')}}">Tin nổi bật</a></h3>
        @foreach ($rightNews as $post)
            <div class="item cf">
                <a href="{{url($post->slug.'.html')}}" class="thumb">
                    <img src="{{url('img/cache/100x80/'.$post->image)}}" alt="hot" width="100" height="80">
                </a>
                <h4>
                    <a href="{{url($post->slug.'.html')}}">{{$post->title}}</a>
                </h4>
            </div>
        @endforeach
    </div>
    @endif
    <!-- /endHot -->
    
</div><!--//col-right-->