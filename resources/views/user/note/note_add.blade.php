@extends('user.public.base')

@section('style')

<style>

.user-info{background:white}
</style>
@endsection

@section('main')
	<div class="user-info">
		<!--标题 -->
	
		<div class="am-cf am-padding">
			<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表动态</strong> / <small></small></div>
		</div>
		<hr/>

		<!--个人信息 -->
		<div class="info-main">
			<form class="am-form am-form-horizontal" method="post" action="/user/note_save" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="am-form-group">
					<label for="user-name2" class="am-form-label">上传图片</label>
					<div class="am-form-content">
						<input type="file" multiple id="user-name2" placeholder="nickname" name="img[]">

					</div>
				</div>
				
					<input type="hidden" name="data_dict_id" value="{{$data_dict_id}}">
				
				<div class="am-form-group1">
					<label for="user-name" class="am-form-label">动态内容</label>
					<div class="am-form-content">
								<textarea class="" rows="6" id="user-intro" name="content" placeholder=""></textarea>
					</div>
				</div>

				<div class="am-form-group">
				
				<div class="info-btn">
					<button type="submit" class="am-btn am-btn-danger">发表动态</button>
				</div>
				</div>
			</form>
			
		</div>

</div>


@endsection


@section('js')




@endsection
