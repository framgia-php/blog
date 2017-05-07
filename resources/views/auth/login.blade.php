@extends('sites.master')

@section('content')
<div class="login-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Please sign in
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="index.html" method="post">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="" placeholder="">
                                    <p class="help-block">Help text here.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">Password</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="" placeholder="">
                                    <p class="help-block">Help text here.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label"></label>
                                <div class="col-md-3">
                                    <div class="checkbox">
                                        <label><input type="checkbox" value="">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a href="#" class="btn btn-info btn-link">Forgot your password?</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <input type="submit" name="" value="Login" class="btn btn-info">
                                    <input type="reset" name="" value="Cancel" class="btn btn-default">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.login-container -->
@endsection
