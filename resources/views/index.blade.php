<html>



<head>






<title>Tabella Compiti</title>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<style type="text/css">

.completo .titolo{

text-decoration:line-through;

}
.completo #update{

display:none;


}

</style>

</head>

<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Tabella Compiti</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">inserimento <span class="sr-only">(current)</span></a></li>
        <li><a href="#"></a></li>
     
      </ul>
      
      {!! Form::open(['method'=>'GET','url'=>'','class'=>'navbar-form navbar-left', 'role'=>'search']) !!}
      
  
     
        <div class="form-group">
     
        
          <input type="text" class="form-control" placeholder="Search" name='Stringa-di-Ricerca'>
        </div>
        <button type="submit" class="btn btn-default">Cerca</button>
     
      {!! Form::close() !!}
      
      
      <ul class="nav navbar-nav navbar-right">
   
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container">

<div class="row">



<div class="col-md-6">

<h2>Inserisci Nuovo Compito</h2>

<form method="POST" action="TaskEsempio/tasks/create">

{{csrf_field()}}

 <div class="form-group {{$errors->has('titolo') ? 'has-danger' : ''}}">
    <label for="exampleSelect2">Seleziona Materia</label>
    <select class="form-control" id="titolo" name="titolo">
    
   
      <option value="Inglese">Inglese</option>
      <option value="Italiano">Italiano</option>
      <option value="Elettrotecnica">Elettrotecnica</option>
      <option value="Elettronica">Elettronica</option>
      <option value="Meccanica">Meccanica</option>
      <option value="Informatica">Informatica</option>
  
      
    </select>
    {!!$errors->first('titolo','<div class="form-control-feedback">:message</div>')!!}
  </div>
<div class="form-group {{$errors->has('corpo') ? 'has-danger' : ''}}">

    <label for="corpo">Compito</label>
    <input type="text" class="form-control" id="corpo" name="corpo" value="{{old('corpo')}}">
    {!!$errors->first('corpo','<div class="form-control-feedback">:message</div>')!!}
    
</div>
  <div class="form-group {{$errors->has('utente_id') ? 'has-danger' : ''}}">
    <label for="exampleSelect2">Seleziona Utente</label>
    <select class="form-control" id="utente_id" name="utente_id">
    
    @foreach($users as $user)
      <option value="{{ $user->id}}">{{ $user->name }}</option>
    @endforeach
      
    </select>
    {!!$errors->first('utente_id','<div class="form-control-feedback">:message</div>')!!}
  </div>



<button type="submit" class="btn btn-primary">Crea Task</button>
  
</form>

<div class="col-md-6">

<h2>Tutti i Compiti</h2>

<ul class="list-group">

  
  
  @foreach($tasks as $task)
  
  
  
  <li class="list-group-item justify-content-between  {{ $task->completo ? 'completo' : '' }}" title="{{$task->corpo}}">
  
 
  
      <?php $email=App\User::where('id',$task->utente_id)->first();?>
      
 <div>
  
       <img src="http://gravatar.com/avatar/{{ md5($email) }}?s=40" class="rounded">
       <span class="ml-3 title"><label>{{$task->titolo}}</label></span>
       <br>
       <br>
       <span class="ml-2 title">{{$task->corpo}}</span>
       
       
 </div>
      <br>
       <div class="form-inline">
       
       <form id="update" method="POST" action="TaskEsempio/tasks/{{ $task->id }}">
       
       {{ csrf_field() }}
       
       {{ method_field('PATCH') }}
       
       <button type="submit" class="btn btn-success">Completa</button>
       
       
       </form>
       
       
       
       <form id="delete" method="POST" action="TaskEsempio/tasks/{{ $task->id }}" onsubmit = "return confirm('Sei sicuro di voler Cancellare?');">
       
       {{ csrf_field() }}
       
       {{ method_field('DELETE')}}
       
       <button type="submit" class="btn btn-danger">Cancella</button>
       
       
       </form>
       </div>
       
  </li>
       
  @endforeach
       
       
      
 
</ul>

 <div class="mt-3">
       {{$tasks->links()}}
  </div>

</div>


</div>

</div>
</div>

</body>



</html>
