@extends('layouts.app')
<style>
    
.table{
  text-align: center;
  vertical-align: middle;
  padding: 0;
}
p{
  height: 36px;
  font-size: 12px;
  margin: 0;
  
}
.abu{
  background-color: rgb(234, 234, 234);
  height: 36px;
  border-radius: 3px;

}
.hari{
  
  border: none;
}
.jam{
  
  height: 50px;
  width: 80px;
}


  </style>
@section('content')
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h3 class="text-dark font-weight-bold my-1 mr-5"><b>Jadwal Pelajaran</b></h3>
                    <!--end::Page Title-->

                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item text-muted">
                        <a href="{{ route('student.dashboard') }}" class="text-muted">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        <a href="" class="text-muted">Jadwal Pelajaran</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <table class="table">
					<thead>
						<tr>
							<th class="hari"></th>
							<th class="hari">Senin</th>
							<th class="hari">Selasa</th>
							<th class="hari">Rabu</th>
              <th class="hari">Kamis</th>
              <th class="hari">Jumat</th>
						</tr>
					</thead>
					<tbody>
				
              <tr>
              	<th class="jam">07.00</th>
                <td style="background-color: #ff7aa2;">
                  <div class="abu">
                    <p>Biologi <br> Pak. rijal</p>
                  </div>
                </td>
                <td style="background-color: #FEED30;">
                  <div class="abu">
                    <p>Matematika <br> pak. Dalton</p>
                  </div>
                </td>
                <td style="background-color: #ff7aa2;">
                  <div class="abu">
                    <p>Biologi <br> Pak. rijal</p>
                  </div>
                </td>
                <td style="background-color: #FF6868;">
                  <div class="abu">
                    <p>Olahraga <br> Pak.Warjo</p>
                  </div>
                </td>
                <td style="background-color: #FEED30;">
                  <div class="abu">
                    <p>Matematika <br> pak. Dalton</p>
                  </div>
                </td>

              </tr>
         
              <tr>
              	<th class="jam">08.00</th>
                <td style="background-color:#ff7aa2;"></td>
                <td style="background-color: #FEED30;"></td>
                <td style="background-color: #ff7aa2;"></td>
                <td style="background-color: #FF6868;"></td>
                <td style="background-color: #FEED30;"></td>
              </tr>

              <tr>
              	<th class="jam">09.00</th>
                <td style="background-color: #5C5470;">
                  <div class="abu">
                    <p>ISTIRAHAT</p>
                  </div>
                </td>
                <td style="background-color: #5C5470;">
                  <div class="abu">
                    <p>ISTIRAHAT</p>
                  </div>
                </td>
                <td style="background-color: #5C5470;">
                  <div class="abu">
                    <p>ISTIRAHAT</p>
                  </div>
                </td>
                <td style="background-color: #5C5470;">
                  <div class="abu">
                    <p>ISTIRAHAT</p>
                  </div>
                </td>
                <td style="background-color: #5C5470;">
                  <div class="abu">
                    <p>ISTIRAHAT</p>
                  </div>
                </td>
              </tr>

              <tr>
              	<th class="jam">10.00</th>
                <td style="background-color: #FEED30;">
                  <div class="abu">
                    <p>Matematika <br> pak. Dalton</p>
                  </div>
                </td>
                <td style="background-color: #ff7aa2;">
                  <div class="abu">
                    <p>Biologi <br> Pak. rijal</p>
                  </div>
                </td>
                <td style="background-color: #FF6868;">
                  <div class="abu">
                    <p>Olahraga <br> Pak.Warjo</p>
                  </div>
                </td>
                <td style="background-color: #FEED30;">
                  <div class="abu">
                    <p>Matematika <br> pak. Dalton</p>
                  </div>
                </td>
                <td style="background-color: #FF6868;">
                  <div class="abu">
                    <p>Olahraga <br> Pak.Warjo</p>
                  </div>
                </td>
              </tr>

              <tr>
              	<th class="jam">11.00</th>
                <td style="background-color:#FEED30;"></td>
                <td style="background-color: #ff7aa2;"></td>
                <td style="background-color: #FF6868;"></td>
                <td style="background-color: #FEED30;"></td>
                <td style="background-color: #FF6868;"></td>
              </tr>

              <tr>
              	<th class="jam">12.00</th>
                <td style="background-color: #5C5470;">
                  <div class="abu">
                    <p>ISTIRAHAT</p>
                  </div>
                </td>
                <td style="background-color: #5C5470;">
                  <div class="abu">
                    <p>ISTIRAHAT</p>
                  </div>
                </td>
                <td style="background-color: #5C5470;">
                  <div class="abu">
                    <p>ISTIRAHAT</p>
                  </div>
                </td>
                <td style="background-color: #5C5470;">
                  <div class="abu">
                    <p>ISTIRAHAT</p>
                  </div>
                </td>
                <td style="background-color: #5C5470;">
                  <div class="abu">
                    <p>ISTIRAHAT</p>
                  </div>
                </td>
              </tr>

              <tr>
              	<th class="jam">13.00</th>
                <td style="background-color: #FF6868;">
                  <div class="abu">
                    <p>Olahraga <br> Pak.Warjo</p>
                  </div>
                </td>
                <td style="background-color: #FEED30;">
                  <div class="abu">
                    <p>Matematika <br> pak. Dalton</p>
                  </div>
                </td>
                <td style="background-color: #ff7aa2;">
                  <div class="abu">
                    <p>Biologi <br> Pak. rijal</p>
                  </div>
                </td>
                <td style="background-color: #FF6868;">
                  <div class="abu">
                    <p>Olahraga <br> Pak.Warjo</p>
                  </div>
                </td>
                <td style="background-color: #FEED30;">
                  <div class="abu">
                    <p>Matematika <br> pak. Dalton</p>
                  </div>
                </td>
              </tr>

              <tr>
              	<th class="jam">14.00</th>
                <td style="background-color: #FF6868;"></td>
                <td style="background-color: #FEED30;"></td>
                <td style="background-color: #ff7aa2;"></td>
                <td style="background-color: #FF6868;"></td>
                <td style="background-color: #FEED30;"></td>
              </tr>

					</tbody>
				</table>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection