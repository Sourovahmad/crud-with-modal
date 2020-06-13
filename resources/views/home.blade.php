@extends('layout.app');
@section('content')
<div class="container">
<!-- 	

<table class="table table-striped table-hover table-bordered ">
	<thead>
		<tr>
			<th scope="col">#</th>
			<th scope="col">First</th>
			<th scope="col">Last</th>
			<th scope="col">Email</th>
			<th scope="col">Phone</th>
			<th scope="col" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody> -->
		<!-- @foreach($data as $student)
		<tr>
			<th scope="row">{{$student->id}} </th>
			<td class="firstname" >{{$student->firstname}} </td>
			<td> {{$student->lastname}} </td>
			<td> {{$student->email }} </td>
			<td> {{$student->phone}} </td>
			<td>
			<button type="button" class="btn btn-success" id="level-edit-item" data-item-id={{$student->id}}> <i class="fa fa-edit" aria-hidden="false"> </i></button>

<form method="POST"  action ="{{ route('destroy',  $student->id )}} "  id="delete-form-{{ $student->id }}"   style="display:none; " >
	{{csrf_field() }}
	{{ method_field("delete") }}
</form>

			</td>
		
	</tr>
	@endforeach -->
</tbody>
</table>
{{$data->links()}}

</div>





    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card mb-4 shadow">


            <div class="card-header py-3 bg-abasas-dark">
                <nav class="navbar navbar-dark ">
                    <a class="navbar-brand"> Level </a>

                </nav>
            </div>

            <div class="card-body">
                <form method="POST" action="{{route('store')}}">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <span class="text-dark pl-2"> firstname</span>
                            <input type="text" name="firstname" class="form-control mb-2" id="inlineFormInput" required >
                        </div>

                        <div class="col-auto">
                            <span class="text-dark pl-2"> lastname</span>
                            <input type="text" name="lastname" class="form-control mb-2" id="inlineFormInput" required >
                        </div>

                        <div class="col-auto">
                            <span class="text-dark pl-2">email</span>
                            <input type="text" name="email"  class="form-control mb-2" id="inlineFormInput" required >
                        </div>
                                    
                        <div class="col-auto">
                            <span class="text-dark pl-2">phone</span>
                            <input type="text" name="phone"  class="form-control mb-2" id="inlineFormInput" required >
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-3 bg-abasas-dark">
                <nav class="navbar navbar-dark ">
                    <a class="navbar-brand">Level List</a>

                </nav>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="dataTable1" width="100%" cellspacing="0">
                        <thead class="bg-abasas-dark">


                        <tr>
                            <th>#</th>
                            <th>firstname</th>
                            <th>lastname</th>
                            <th>email</th>
                            <th>phone</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php $i = 1; ?>
                        @foreach ($data as $level)
                            <?php $id = $level->id; ?>
                            <tr class="data-row">
                                <td class="iteration">{{$i++}}</td>
                                <td class="  word-break firstname">{{$level->firstname}}</td>
                                <td class=" word-break lastname ">{{$level->lastname}}</td>
                                <td class=" word-break email ">{{$level->email}}</td>
                                <td class=" word-break phone ">{{$level->phone}}</td>

                            s


                                <td class="align-middle">
                                <button type="button" class="btn btn-success" id="level-edit-item" data-item-id={{$id}}> <i class="fa fa-edit" aria-hidden="false"> </i></button>

                                    <form method="POST" action="{{ route('destroy',  $level->id )}} " id="delete-form-{{ $level->id }}" style="display:none; ">
                                        {{csrf_field() }}
                                        {{ method_field("delete") }}
                                    </form>


                                    <button onclick="if(confirm('are you sure to delete this')){
                                        document.getElementById('delete-form-{{ $level->id }}').submit();
                                        }
                                        else{
                                        event.preventDefault();
                                        }
                                        " class="btn btn-danger btn-sm btn-raised">
                                        <i class="fa fa-trash" aria-hidden="false"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

 <!-- Attachment Modal -->
    <div class="modal fade" id="level-edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="edit-modal-label ">Edit Level</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="attachment-body-content">
                    <form id="level-edit-form" class="form-horizontal" method="POST" action="">
                    @csrf
              

                    <!-- id -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-id">Id </label>
                            <input type="text" name="id" class="form-control" id="modal-input-id" required readonly>
                        </div>
                        <!-- /id -->
                        <!-- name -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-firstname">firstname</label>
                            <input type="text" name="firstname" class="form-control" id="modal-input-firstname" required autofocus>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-lastname">lastname</label>
                            <input type="text" name="lastname" class="form-control" id="modal-input-lastname" required autofocus>
                        </div>
                        <!-- /name -->  
                        <!-- description -->
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-email">email</label>
                            <input type="text" name="email" class="form-control" id="modal-input-email" required>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="modal-input-phone">phone</label>
                            <input type="text" name="phone" class="form-control" id="modal-input-phone" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Submit" class="form-control btn btn-success">
                        </div>
                        <!-- /description -->
                    </form>
                </div>

            </div>
        </div>
    </div>



@endsection


