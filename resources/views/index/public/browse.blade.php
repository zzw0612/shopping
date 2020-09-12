<div class="browse">
	<div class="mc"> 
		<ul>					    
			<div class="mt">            
				<h2>看了又看</h2>        
			</div>
			@if(isset($browse))
			@foreach ($browse as $value)
			<li class="first">
				<div class="p-img">                    
					<a  href="#"> <img class="" src="/uploads/{{$value['default_img']}}"> </a>               
				</div>
				<div class="p-name"><a href="#">
				{{$value['name']}}
				</a>
				</div>
				<div class="p-price"><strong>￥{{$value['shop_price']}}</strong></div>
			</li>
			@endforeach
			@else
			<li class="first">
				<div class="p-img">                    
					<a  href="#"> <img class="" src="/user/images/browse1.jpg"> </a>               
				</div>
				<div class="p-name"><a href="#">
					【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
				</a>
				</div>
				<div class="p-price"><strong>￥35.90</strong></div>
			</li><li class="first">
				<div class="p-img">                    
					<a  href="#"> <img class="" src="/user/images/browse1.jpg"> </a>               
				</div>
				<div class="p-name"><a href="#">
					【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
				</a>
				</div>
				<div class="p-price"><strong>￥35.90</strong></div>
			</li><li class="first">
				<div class="p-img">                    
					<a  href="#"> <img class="" src="/user/images/browse1.jpg"> </a>               
				</div>
				<div class="p-name"><a href="#">
					【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
				</a>
				</div>
				<div class="p-price"><strong>￥35.90</strong></div>
			</li>
			@endif
		</ul>					
	</div>
</div>