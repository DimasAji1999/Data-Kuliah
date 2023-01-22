@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">

                <form role="form" accept="{{ url('matkul/add') }}" method="post">
                    @csrf
                <div class="box-body">
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                    @endif
                    <div class="form-group">
                    <label for="exampleInputEmail1">Pilih Matkul</label>
                    <select class="form-control select2" name="siswa">
                        @foreach($siswa as $sp)
                        <option value="{{ $sp->id }}">{{ $sp->nama }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Matkul</label>
                    <input type="text" name="matkul" class="form-control" id="exampleInputEmail1" placeholder="Mata Kuliah">
                    </div>
                    <div class="form-group">
                    <label for="exampleInputPassword1">SKS</label>
                    <input type="number" name="sks" class="form-control" id="exampleInputPassword1" placeholder="SKS">
                    </div>
                </div>
                <!-- /.box-body -->
    
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
               
            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection