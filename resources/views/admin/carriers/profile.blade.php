@extends('layouts.master')

@section('content')

<h3>Carrier</h3>

<div class="panels">
    <div class="panel-1">
        <div class="panel-1a">
            <ul>
                <li>Name: {{$carrier->name}}</li>
                <li>
                    <span>Status: {{ucfirst($carrier->status)}}</span><div id="statusModalBtn" class="edit-btn"><a class="k-button k-primary" href="#">{{$carrier->status === 'active' ? 'Deactivate' : 'Activate' }}</a></div>
                    <!-- Modal -->
                        <div id="statusFormModal" class="modal">
                            <div class="modal-content">
                                <span class="statusModalClose close">&times;</span>
                                <form method="POST" action="{{route('admin.carriers.toggleStatus')}}">
                                    @csrf
                                    <div class="k-content">
                                        <ul class="fieldlist">
                                            <li>
                                                <p>Are you sure you want to {{$carrier->status === 'active' ? 'deactivate' : 'activate' }} {{ $carrier->name }}?</p>
                                                <p style="padding-top: 1em; text-align: right">
                                                    <input type="text" name="id" value="{{$carrier->id}}" hidden>
                                                    <button type="submit" class="k-button k-primary">Submit</button>
                                                    <a class="statusModalCloseButton k-button" >Cancel</a>
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <!-- End Modal -->
                </li>
                <li>
                    <span>Remote Areas</span><a class="k-button k-primary">View</a>
                </li>
                <li>
                    <span>API Details</span><button class="k-button k-primary">View</button>
                </li>
            </ul>
        </div>
        <div class="panel-1b">
            
        </div>
    </div>
    <div class="panel-2">
        <div id="tabstrip">
            <ul>
                <li class="k-state-active">
                    Shipments
                </li>
                <li>
                    Tariffs
                </li>
                <li>
                    Surcharges
                </li>
                <li>
                    Tab 4
                </li>
            </ul>
            <div>
                <table class="grid">
                    <colgroup>
                        <col />
                        <col />
                        <col style="width:110px" />
                        <col style="width:120px" />
                        <col style="width:130px" />
                    </colgroup>
                    <thead>
                    <tr>
                        <th data-field="make">Car Make</th>
                        <th data-field="model">Car Model</th>
                        <th data-field="year">Year</th>
                        <th data-field="category">Category</th>
                        <th data-field="airconditioner">Air Conditioner</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Volvo</td>
                        <td>S60</td>
                        <td>2010</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Audi</td>
                        <td>A4</td>
                        <td>2002</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>BMW</td>
                        <td>535d</td>
                        <td>2006</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>BMW</td>
                        <td>320d</td>
                        <td>2006</td>
                        <td>Saloon</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>VW</td>
                        <td>Passat</td>
                        <td>2007</td>
                        <td>Saloon</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>VW</td>
                        <td>Passat</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Peugeot</td>
                        <td>407</td>
                        <td>2006</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Honda</td>
                        <td>Accord</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>Alfa Romeo</td>
                        <td>159</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>Nissan</td>
                        <td>Almera</td>
                        <td>2001</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Mitsubishi</td>
                        <td>Lancer</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Opel</td>
                        <td>Vectra</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Toyota</td>
                        <td>Avensis</td>
                        <td>2006</td>
                        <td>Saloon</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>Toyota</td>
                        <td>Avensis</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Toyota</td>
                        <td>Avensis</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Audi</td>
                        <td>Q7</td>
                        <td>2007</td>
                        <td>SUV</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Hyundai</td>
                        <td>Santa Fe</td>
                        <td>2012</td>
                        <td>SUV</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Hyundai</td>
                        <td>Santa Fe</td>
                        <td>2013</td>
                        <td>SUV</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Nissan</td>
                        <td>Qashqai</td>
                        <td>2007</td>
                        <td>SUV</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Mercedez</td>
                        <td>B Class</td>
                        <td>2007</td>
                        <td>Hatchback</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Lancia</td>
                        <td>Ypsilon</td>
                        <td>2006</td>
                        <td>Hatchback</td>
                        <td>Yes</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <table class="grid">
                    <colgroup>
                        <col />
                        <col />
                        <col style="width:110px" />
                        <col style="width:120px" />
                        <col style="width:130px" />
                    </colgroup>
                    <thead>
                    <tr>
                        <th data-field="make">Car Make</th>
                        <th data-field="model">Car Model</th>
                        <th data-field="year">Year</th>
                        <th data-field="category">Category</th>
                        <th data-field="airconditioner">Air Conditioner</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Volvo</td>
                        <td>S60</td>
                        <td>2010</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Audi</td>
                        <td>A4</td>
                        <td>2002</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>BMW</td>
                        <td>535d</td>
                        <td>2006</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>BMW</td>
                        <td>320d</td>
                        <td>2006</td>
                        <td>Saloon</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>VW</td>
                        <td>Passat</td>
                        <td>2007</td>
                        <td>Saloon</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>VW</td>
                        <td>Passat</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Peugeot</td>
                        <td>407</td>
                        <td>2006</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Honda</td>
                        <td>Accord</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>Alfa Romeo</td>
                        <td>159</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>Nissan</td>
                        <td>Almera</td>
                        <td>2001</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Mitsubishi</td>
                        <td>Lancer</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Opel</td>
                        <td>Vectra</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Toyota</td>
                        <td>Avensis</td>
                        <td>2006</td>
                        <td>Saloon</td>
                        <td>No</td>
                    </tr>
                    <tr>
                        <td>Toyota</td>
                        <td>Avensis</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Toyota</td>
                        <td>Avensis</td>
                        <td>2008</td>
                        <td>Saloon</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Audi</td>
                        <td>Q7</td>
                        <td>2007</td>
                        <td>SUV</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Hyundai</td>
                        <td>Santa Fe</td>
                        <td>2012</td>
                        <td>SUV</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Hyundai</td>
                        <td>Santa Fe</td>
                        <td>2013</td>
                        <td>SUV</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Nissan</td>
                        <td>Qashqai</td>
                        <td>2007</td>
                        <td>SUV</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Mercedez</td>
                        <td>B Class</td>
                        <td>2007</td>
                        <td>Hatchback</td>
                        <td>Yes</td>
                    </tr>
                    <tr>
                        <td>Lancia</td>
                        <td>Ypsilon</td>
                        <td>2006</td>
                        <td>Hatchback</td>
                        <td>Yes</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div>
                <table class="grid">
                    <colgroup>
                        <col style="width:300px" />
                        <col />
                        <col style="width:200px" />
                    </colgroup>
                    <thead>
                    <tr>
                        <th data-field="name">Name</th>
                        <th data-field="description">Description</th>
                        <th data-field="actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Remote Area</td>
                            <td>Charge for delivery to remote areas. £0.38 per kg. Minimum charge £19.00 per shipment.</td>
                            <td><a href="" class="k-button k-primary"><i class="fas fa-eye"></i></a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div>
                Tab 4
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
@parent
<link rel="stylesheet" href="{{asset('css/carrier.profile.css')}}">
@endsection

@section('scripts')
<script src="{{asset('js/carrier.profile.js')}}"></script>
@endsection
