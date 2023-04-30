@include('templates.header')

<section class="content-header">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <h1>Najczęsciej zadawane pytania</h1>
            </div>
        </div>
    </div>
</section>

<div class="row justify-content-center">
    <div class="col-10">
    
        @foreach ($faq as $item)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$item->question}}</h3>
            </div>
            <div class="card-body" style="display: block;">
                {{$item->answer}}
            </div>
        </div>
        @endforeach
        
    
    </div>
</div>

@include('templates.footer')
