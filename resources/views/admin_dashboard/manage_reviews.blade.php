@extends('layouts.admin_main.master')

@section('content')

<style>

    .action-buttons  {
        padding: 5px;
        width: 35px;
    }

    .tab-content .table {
        margin-top: 20px;
    }

   
</style>

<main style="margin-top: 58px">
    <div class="container pt-4 px-4"> 
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center">
            <h3 class="py-3 mb-0">Manage Reviews</h3>
        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active fw-bold" id="published-tab" data-bs-toggle="tab" href="#published" role="tab" aria-controls="published" aria-selected="true">Published</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link fw-bold" id="pending-tab" data-bs-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending (2)</a>
            </li> 
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- published Tab -->
            <div class="tab-pane fade show active" id="published" role="tabpanel" aria-labelledby="published-tab">
                <div class="card mt-1">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Reviewer</th>
                                        <th style="width: 30%">Review</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="\assets\images\d (1).png" alt="Product Image" width="50" height="auto">
                                            <div style="display: inline-block; vertical-align: top;">Brown Hat</div>
                                        </td>
                                        <td>
                                            <img src="\assets\images\user.png" alt="User Image" width="40" height="auto" style="border-radius: 50%;">
                                            <div style="display: inline-block; vertical-align: top;">Manushi Weerasinghe</div>
                                        </td>
                                        <td>
                                            <div class="rating text-warning">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <p>I just love it! I bought this hat for my boyfriend, but then I found out he cheated on me, so I kept it and I love it! I wear it all the time and there is no problem with the fit even though it's a men's hat.</p>
                                        </td>
                                        <td>23/09/2024</td>
                                        <td><span class="badge bg-success">Published</span></td>
                                        <td><form id="" action="" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm mb-1" style="font-size: 0.75rem; padding: 0.25rem 0.5rem;" onclick="confirmDelete('')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Tab -->
            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                <div class="card mt-1">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Reviewer</th>
                                        <th style="width: 30%">Review</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="\assets\images\d (1).png" alt="Product Image" width="50" height="auto">
                                            <div style="display: inline-block; vertical-align: top;">Brown Hat</div>
                                        </td>
                                        <td>
                                            <img src="\assets\images\user.png" alt="User Image" width="40" height="auto" style="border-radius: 50%;">
                                            <div style="display: inline-block; vertical-align: top;">Manushi Weerasinghe</div>
                                        </td>
                                        <td>
                                            <div class="rating text-warning">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <p>I just love it! I bought this hat for my boyfriend, but then I found out he cheated on me, so I kept it and I love it! I wear it all the time and there is no problem with the fit even though it's a men's hat.</p>
                                        </td>
                                        <td>23/09/2024</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-link dropdown-toggle" type="button" id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="actionDropdown">
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-upload me-2"></i> Publish
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="fas fa-trash-alt me-2"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

       
        </div>
    </div>
</main>



@endsection
