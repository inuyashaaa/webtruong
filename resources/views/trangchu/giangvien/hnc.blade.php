@extends('trangchu.layout.index')
@section('content')
    <div class="row">
        <div class="col s12">
            <div class="card-panel hoverable">
                <h5 class="blue-grey-text">Đăng ký hướng nghiên cứu</h5>
                <div class="divider"></div>
                <br>
                <form action="" method="POST" role="form">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                        <div class="input-field col s8">
                            <input id="hcn" type="text" name="hnc">
                            <label for="hnc">Hướng nghiên cứu</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light green" type="submit" name="action">Thêm
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
