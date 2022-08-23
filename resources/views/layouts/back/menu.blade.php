    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-3 col-lg-2 sidebar collapse" id="sidebar">
                <div class="list-group">
                    <a href="{{route('back.index')}}" class="list-group-item">
                        <span class="fa fa-fw fa-dashboard"></span> Anasayfa</a>
                    <a href="{{route('urun.index')}}" class="list-group-item">
                        <span class="fa fa-fw fa-dashboard"></span> Urunler
                        <span class="badge badge-dark badge-pill pull-right">14</span>
                    </a>
                    <a href="#" class="list-group-item collapsed" data-target="#submenu1" data-toggle="collapse" data-parent="#sidebar"><span class="fa fa-fw fa-dashboard"></span> Categories<span class="caret arrow"></span></a>
				  <div class="list-group collapse" id="submenu1">
					<a href="#" class="list-group-item">Category</a>
					<a href="#" class="list-group-item">Category</a>
				  </div>
                    <a href="{{route('kullanici.index')}}" class="list-group-item">
                        <span class="fa fa-fw fa-dashboard"></span> Kullanıcılar
                        <span class="badge badge-dark badge-pill pull-right">{{ \App\Http\Controllers\back\KullaniciKontroller::kullanici_sayi() }}</span>
                    </a>
                    <a href="{{route('kategori.index')}}" class="list-group-item">
                        <span class="fa fa-fw fa-dashboard"></span> Kategoriler
                        <span class="badge badge-dark badge-pill pull-right">{{ \App\Http\Controllers\back\KategoriController::kategori_sayi() }}</span>
                    </a>
                    <a href="#" class="list-group-item">
                        <span class="fa fa-fw fa-dashboard"></span> Orders
                        <span class="badge badge-dark badge-pill pull-right">14</span>
                    </a>
                </div>
            </div>