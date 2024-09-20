@extends('admins.layouts.app')

@section('content')
<div class="px-4 sm:px-6 lg:px-8">
    <div class="py-8 px-4 sm:px-10 border-cyan-600 ">



        <div class="px-4 sm:px-6 lg:px-8">

            <div class="bg-white py-8 px-4 shadow-lg rounded-lg sm:px-10 border-cyan-600 border">
        
                <div class="sm:flex sm:items-center sm:justify-between">
                    <div class="sm:flex ">
                    <h1 class="text-xl font-semibold text-gray-900">User Detail</h1>
                    </div>
                </div>
        
                
                <div class="mt-8 flex flex-col px-4 sm:px-6 lg:px-8">
                    <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
                    <div class=" grid grid-cols-4 gap-4 sm:grid-cols-6 w-full py-2 align-middle">
                        <div class="col-span-6 sm:col-span-3 w-full">
                            <table class="w-auto d-table align-top">
                                <thead>
                                <tr>
                                    <td scope="col" class=" py-2 pr-3 text-left text-sm ">Name</td>
                                    <th scope="col" class=" py-2 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6 lg:pl-8"> {{ $user->name }}
                                    </th>
                                </tr>
                                <tr>
                                    <td scope="col" class=" py-2 pr-3 text-left text-sm ">Employee No</td>
                                    <th scope="col" class=" py-2 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6 lg:pl-8">{{ $user->employee_number }}
                                    </th>
                                </tr>
                                <tr>
                                    <td scope="col" class=" py-2 pr-3 text-left text-sm ">Position</td>
                                    <th scope="col" class=" py-2 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6 lg:pl-8">{{ $user->positions->name }}
                                    </th>
                                </tr>
        
                                <tr>
                                    <td scope="col" class=" py-2 pr-3 text-left text-sm ">Role</td>
                                    <th scope="col" class=" py-2 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6 lg:pl-8">
                                    </th>
                                </tr>
                                <tr>
                                    <td scope="col" class=" py-2 pr-3 text-left text-sm ">Permission</td>
                                    <th scope="col" class=" py-2 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6 lg:pl-8">
                                                                        <button class="bg-cyan-500 py-0.5 px-1 m-1 cursor-text font-semibold rounded text-white">follow-counted</button>
                                                                    </th>
                                </tr>
                                </thead>
        
                            </table>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <table class="w-auto d-table align-top">
                                <thead>
        
                                <tr>
                                    <td scope="col" class=" py-2 pr-3 text-left text-sm ">Department</td>
                                    <th scope="col" class=" py-2 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6 lg:pl-8">{{ $user->departments->name }}
                                    </th>
                                </tr>
                                <tr>
                                    <td scope="col" class=" py-2 pr-3 text-left text-sm ">Category</td>
                                    <th scope="col" class=" py-2 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6 lg:pl-8">
                                                                    </th>
                                </tr>
                                <tr>
                                    <td scope="col" class=" py-2 pr-3 text-left text-sm ">Branch</td>
                                    <th scope="col" class=" py-2 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6 lg:pl-8">
                                        {{ $user->branch->branch_name }}
                                                                    </th>
                                </tr>
                                <tr>
                                    <td scope="col" class="py-2 pr-3 text-left text-sm">Status</td>
                                    <th scope="col" class="py-2 pl-4 pr-3 text-left text-sm font-semibold sm:pl-6 lg:pl-8">
                                        <span class="bg-emerald-500 py-0.5 px-1 font-semibold rounded text-white">
                                            {{ $user->status == 1 ? 'Active' : 'Inactive' }}
                                        </span>
                                    </th>
                                </tr>
                                </thead>
        
                            </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="my-4 sm:mt-0 sm:flex-none py-8">
                <a href="{{ route('users.index') }}" class="inline-flex items-center justify-center rounded-md border border-transparent bg-cyan-600 px-4 py-2 text-sm font-bold text-white shadow-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 sm:w-auto hover:shadow-xl">&lt;&lt; Back</a>
            </div>
        </div>
        
    </div>

</div>


@endsection

@section('script')
<script src="{{ asset('/js/user_crud.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // $('#usersTable').DataTable();
    });
</script>


@endsection

