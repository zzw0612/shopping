<!--顶部导航条 -->
<div class="header-top">
	<div class="am-container header">
		<ul class="message-l">
			<div class="topMessage">
				<div class="menu-hd">
				你好，
					@if(!is_null(session('user')))
					{{session('user')['user_name']}},
					<a href="/logout">,退出登录</a>
					@else
					<a href="/login">请先登录</a>
					<a href="/register">注册</a>
					@endif
				</div>
			</div>
		</ul>
		<ul class="message-r">
			<div class="topMessage my-shangcheng">
				<div class="menu-hd MyShangcheng"><a href="/user/index" target="_top">会员中心</a></div>
			</div>
			<div class="topMessage mini-cart">
				<div class="menu-hd"><a id="mc-menu-hd" href="/admin/index" target="_top"><span>商户中心</span><strong id="J_MiniCartNum" class="h"></strong></a></div>
			</div>
			<div class="topMessage favorite">
				<div class="menu-hd"><a href="#" target="_top"><span>帮助</span></a></div>
			</div>
		</ul>
	</div>
</div>

<!--悬浮搜索框-->

<div class="nav white">
	
	<div class="logoBig">
		<li><img src="/user/images/logobig.png" /></li>
	</div>

	<div class="search-bar pr">
		<a name="index_none_header_sysc" href="#"></a>
		<form>
			<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
			<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
		</form>
	</div>
</div>

<div class="clear"></div>
<b class="line"></b>

            