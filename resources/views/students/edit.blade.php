@extends('layouts.master')

@section('title')
Modifier un Etudiant
@endsection

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Modification de {{ $student->user->full_name }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                    <li class="breadcrumb-item active">Modifier un Etudiant</li>
                </ol>
            </div>
             
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
             @endif
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Modifier un Etudiant</h4>
                <form action="{{ route('etudiants.update',['id' => $student->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">
                        <label for="nom" class="col-form-label col-lg-2">Nom</label>
                        <div class="col-lg-10">
                            <input  id="nom" name="first_name" type="text" value="{{ $student->first_name }}" class="form-control" placeholder="Entrer le prénom...">
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="last_name" class="col-form-label col-lg-2">Prénom</label>
                        <div class="col-lg-10">
                            <input autocomplete="off" id="last_name" name="last_name" value="{{ $student->last_name }}" type="text" class="form-control" placeholder="Entrer le nom...">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="natioanlity" class="col-form-label col-lg-2">Nationalité</label>
                        <div class="col-lg-10">
                            <select class="form-select mb-4" name="nationality">
                               <option value="Maroc" {{ $student->nationality === 'Maroc' ? 'Selected' : '' }}>Marocaine</option>
                               <option value="Algerie" {{ $student->nationality === 'Algerie' ? 'Selected' : '' }}>Algèrienne</option>
                               <option value="Tunisie" {{ $student->nationality === 'Tunisie' ? 'Selected' : '' }}>Tunisienne</option>
                               <option value="Egypt" {{ $student->nationality === 'Egypt' ? 'Selected' : '' }}>Egyptienne</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="age" class="col-form-label col-lg-2">L'age</label>
                        <div class="col-lg-10">
                            <input id="age" autocomplete="off" value="{{ $student->age }}" name="age" type="text" class="form-control" placeholder="Entrer l'age...">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-form-label col-lg-2">Date de Naissance</label>
                        <div class="col-lg-10">
                        <div class="input-group" id="datepicker2">
                                <input autocomplete="off" type="text" value="{{ $student->user->b_day}}" class="form-control" placeholder="dd-M-yyyy" name="birth"
                                        data-date-format="dd-mm-yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                                        data-date-autoclose="true">
                                       <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                            </div>
                        </div><!-- input-group -->              
                      </div>
                   

                    <div class="row mb-4">
                        <label for="cin" class="col-form-label col-lg-2">CIN</label>
                        <div class="col-lg-10">
                            <input autocomplete="off" id="cin" value="{{ $student->cin }}" name="cin" type="text" class="form-control" placeholder="Entrer le numero d'identité national...">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="email" class="col-form-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                            <input autocomplete="off" id="email" value="{{ $student->user->email }}" name="email" type="text" class="form-control" placeholder="Entrer l'email...">
                        </div>
                    </div>

                    
                    <div class="row mb-4">
                        <label for="address" class="col-form-label col-lg-2">Adresse</label>
                        <div class="col-lg-10">
                            <textarea autocomplete="off" class="form-control" name="address" id="projectdesc" rows="3" placeholder="Entrer l'adresse...">{{ $student->address }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="gsm" class="col-form-label col-lg-2">Téléphone - GSM</label>
                        <div class="col-lg-10">
                            <input autocomplete="off" id="gsm" name="gsm" value="{{ $student->gsm }}" type="text" class="form-control" placeholder="Entrer le numero de telephone...">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label for="natioanlity" class="col-form-label col-lg-2">Niveau d'etudes</label>
                        <div class="col-lg-10">
                            <select class="form-select mb-4" name="study_level">
                               <option value="without_bac" {{ $student->study_level === 'without_bac' ? 'Selected' : '' }}>Sans Bac</option>
                               <option value="level_bac" {{ $student->study_level === 'level_bac' ? 'Selected' : '' }}>Niveau Bac</option>
                               <option value="bac" {{ $student->study_level === 'bac' ? 'Selected' : '' }}>Bac</option>
                               <option value="superior" {{ $student->study_level === 'superior' ? 'Selected' : '' }}>Etudes Superieurs</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-4">
                    <label class="col-form-label col-lg-2">Photo de Profile (Preview)</label>
                    <div class="col-lg-10">
                        <img class="mb-4" src="{{ $student->user->avatar }}" width="100" height="100" alt="">
                        <input type="file" name="avatar" class="form-control" id="inputGroupFile01">
                    </div>
                    </div>

                
               
                <div class="row justify-content-end">
                    <div class="col-lg-10">
                        <button type="submit" class="btn btn-primary">Création de l'Etudiant</button>
                        <button type="reset" class="btn btn-success">Annuler</button>

                    </div>
                </div>
                </form>
               
            </div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row mb-4 mt-4">
    <div class="col-lg-12">
       <div class="card">
           <div class="card-title mt-2 p-4">
               <h4>Uploader les documents:</h4>
           </div>
           <div class="p-4">
            <div class="table-responsive">
                <table class="table mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Type de Document</th>
                            <th>Ajouté par</th>
                            <th>Date d'ajout</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @forelse ($student->attachments()->get() as $attachment)
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td>{{ $attachment->name }}</td>
                            <td>{{ $attachment->student->user->full_name }}</td>
                            <td>{{ $attachment->created_at }}</td>
                            <td colspan="2">
                                <a class="btn btn-outline-success btn-sm"
                                href="{{ route('attachments.etudiant.view',['id' => $attachment->id]) }}"
                                role="button"><i class="fas fa-eye"></i>&nbsp;
                                Voir</a>

                            <a class="btn btn-outline-info btn-sm"
                                href="{{ route('attachments.etudiant.download',['id' => $attachment->id]) }}"
                                role="button"><i
                                    class="fas fa-download"></i>&nbsp;
                                Telecharger</a>

                                <button id="deleteAtt" class="btn btn-outline-danger btn-sm"
                                data-attachment_id="{{ $attachment->id }}" 
                                data-bs-toggle="modal" 
                                data-bs-target="#staticBackdrop">Supprimer</button>
                            </td> 
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
           </div>
           <div class="card-body">
                <form action="{{ route('attachments.etudiant.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <p>Type de Document à uploader:</p>
                        <select class="form-select mb-4" name="document_type">
                            <option value="Cin">Cin</option>
                            <option value="Photo">Photo</option>
                            <option value="Diplome">Diplome</option>
                            <option value="Attestation">Attestation</option>
                         </select>
                    </div>
                    <p class="text-danger">(*) Vous pouvrz uploader que : PDF,JPG,JPEG,PNG</p>
                    <div class="input-group">
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <input type="file" class="form-control" name="file" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04">Uploader</button>  
                    </div> 
                </form>

           </div>
         
        
       </div>
    </div>
</div>

<div class="row mb-4 mt-4">
    <div class="col-lg-12">
        
       <div class="card">
           <div class="card-title mt-2 p-4">
               <h4>Affecter Les Formations :</h4>
           </div>
        <div class="card-body">
            <form action="{{ route('etudiants.book') }}" method="post" enctype="multipart/form-data">
                @csrf

                <p>Liste Des Formations :</p>
                <div class="row">
                    <div class="col-lg-10">
                        <select class="form-select mb-4" name="formation">
                            @forelse ($formations as $formation)
                                <option value="{{ $formation->id }}">{{ $formation->title }} - Par  {{ $formation->instructor->user->full_name }}</option>
                            @empty
                            <option value="0">Pas de Formations</option>                                
                            @endforelse
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <div class="input-group">
                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                            <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04">Inscrire au Formation</button>  
                        </div> 
                    </div>
                </div>
                
            </form>

       </div>
           <div class="p-4">
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nom Formation</th>
                            <th>Ajouté par</th>
                            <th>Date d'ajout</th>
                            <th>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @forelse ($student->courses()->get() as $course)
                        <tr>
                            <th scope="row"><?php echo $i++; ?></th>
                            <td>{{ $course->title }}</td>
                            <td>-----</td>
                            <td>{{ $course->created_at }}</td>
                            <td colspan="2">
                                <a class="btn btn-outline-success btn-sm"
                                href=""
                                role="button"><i class="fas fa-eye"></i>&nbsp;
                                Voir</a>

                                <button id="deleteAtt" class="btn btn-outline-danger btn-sm"
                                data-course_id="{{ $course->id }}" 
                                data-student_id="{{ $student->id }}" 
                                data-bs-toggle="modal" 
                                data-bs-target="#staticBackdrop">Supprimer</button>
                            </td> 
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
           </div>
       </div>
    </div>
</div>


<!-- Static Backdrop Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Suppression de Formation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <form action="{{ route('etudiants.bookDelete') }}" method="POST" autocomplete="off">
            @csrf
            
            <div class="modal-body">
                <p>Vous êtes sûr de vouloir Supprimer cette Formation ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                <input type="hidden" name="course_id" id="course_id" value="" />
                <input type="hidden" name="student_id" id="student_id" value="" />
                <button type="submit" class="btn btn-danger">Je suis Sûr !</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    function submiting() {
        var form = document.getElementById("deletingForm");
        form.submit();
    }
</script>

<script>
    $('#staticBackdrop').on('show.bs.modal',function(event){
         var button = $(event.relatedTarget);
         var courseId = button.data('course_id');
         var studentId = button.data('student_id');

         $('#course_id').val(courseId);
         $('#student_id').val(studentId);
         console.log('done');
    });
</script>
@endsection
