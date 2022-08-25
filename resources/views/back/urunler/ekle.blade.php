
@extends('layouts.back.master') 
@section('title','Ürün Ekle')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2 main">
                <h1 class="sub-header">Ürün Ekle</h1>
                <form action="{{route('urun.ekle')}}" method="post" enctype='multipart/form-data'>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </div>
                    @endif
                    @if(session('mesaj'))
                     <div class="alert alert-success">
                        {{session('mesaj')}}
                     </div>
                     @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Urun Adı</label>
                                <input type="text" name="urun_adi" class="form-control" id="exampleInputEmail1" placeholder="Ürün Ad" value="{{old('urun_adi')}}">
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Slug</label>
                                <input type="text" name="slug" class="form-control" id="exampleInputEmail1"  value="{{old('slug')}}">
                            </div>
                        </div>
                      
                      
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Açıklama</label>
                                <textarea class="form-control" name="aciklama">{{old('aciklama')}}</textarea>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Fiyat</label>
                                <input type="number" name="fiyat" class="form-control" id="exampleInputEmail1"  value="{{old('fiyat')}}">
                            </div>
                        </div>
                      
                      
                    </div>
                   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group kat" id="kat">
                                <label for="ust_id">Kategori Seçiniz</label>
                                <select class="form-select form-control ust_id" id="ust_id" name="ust_id" aria-label="Default select example">
                                   <option value="">Seçiniz</option>
                                 @foreach($kategoriler as $k)
                                  <option value="{{$k->id}}" >{{$k->kategori_adi}}</option>
                                 @endforeach
                                </select>

                            </div>
                        </div>

                         <div class="col-md-6">
                            <div class="form-group">
                               <label for="image">Resim</label>
                                <input type="file"  id="image" name="image[]" class="form-control" multiple="multiple" >
                            </div>
                          </div>
                        
                    </div>
                   <div class="row mt-2" style="margin-top:20px;">

                        <div class="col-md-12">
                             <button type="submit" class="btn btn-primary form-control">Ekle</button>
                        </div>
                        
                    </div>
                   
                </form>

               

            </div>
@endsection
@section('js')
  <script>
$(document).on('change','.ust_id',function(e) {
    
        var id=$(this).val();
       
        var myarray = '<label for="ust_id">Kategori Seçiniz</label><select class="form-select form-control ust_id" id="ust_id" name="ust_id" aria-label="Default select example">';
        
      
       
        $.ajax({
           type:'get',

           url:"{{ route('kategori.cek') }}",

           data:{id:id},

           success:function(data){
              console.log(data);

              
            if(data.count>0){
              myarray+='<option>Seçiniz</option>';
            }
            else{
              return false;
            }
            $.each( data.altkategoriler, function( key, value ) {
              console.log(value);
               if(data.count==0){
                alert('boş');
              }
              else{
                 myarray+='<option value="'+value.id+'">'+value.kategori_adi+'</option>';
              }
             
            
             

        });
             myarray+='</select>';
              $('.kat').html(myarray);
            
           

           }

        });
      
      
    });


</script>
@endsection