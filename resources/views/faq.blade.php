@include('templates.header')

<div class="main-container">
    <p class="title">
        Na tej podstronie znajdziesz najczęsciej zadawane pytanie i odpowiedzi na nie.
    </p>
</div>

@foreach ($faq as $item)
    <div class="main-container">
        <div class="content">
            <p class='sub-title'>{{$item->question}}</p>
            <hr>
            <p>{{$item->answer}}</p>
        </div>
    </div>
@endforeach

@include('templates.footer')
