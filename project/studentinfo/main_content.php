<main class='px-2 mx-2'>
        <!-- parent card -->
        <div class='card my-4  shadow' id='E1S2_details'>
            <h5 class='card-header bg--subtle'> E1(O20)</h5>
            <div class='card-body  d-none d-sm-flex  row gx-2 justify-content-center year' id='E1S2'> </div>
            <div class='card-body d-flex d-sm-none row gx-2 justify-content-center year' id='E1S2_mb'>
                <table class='table  table-bordered-2 table-striped mx-lg-2 mx-sm-1 w-100 ' style='min-width:max-content;'>
                    <thead>
                        <tr class='table-dark'>
                            <th scope='col'>BRANCH</th>
                            <th scope='col'>TOTAL</th>
                            <th scope='col'>IN</th>
                            <th scope='col'>OUT</th>
                        </tr>
                    </thead>
                    <tbody id='E1S2_table'>
                    </tbody>
                </table>
            </div>
            <div class='card-footer' id='E1S2_OVERALL'>
                <table class='table table-dark-subtle table-stripped-columns w-100'>
                    <thead>
                        <tr>
                            <th>TOTAL</th>
                            <th>IN</th>
                            <th>OUT</th>
                            <th>OUT %</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id='E1S2_TOTAL'></td>
                            <td id='E1S2_IN'></td>
                            <td id='E1S2_OUT'></td>
                            <td id='E1S2_OUT_PER'></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class='card my-4 shadow' id='E2S2_details'>
            <h5 class='card-header bg-primary-subtle'> E2(O19)</h5>
            <div class='card-body d-none d-sm-flex row gx-2 justify-content-center year ' id='E2S2'></div>
            <div class='card-body d-flex d-sm-none row gx-2 justify-content-center year ' id='E2S2_mb'>

                <table class='table  table-bordered-2 table-striped mx-lg-2 mx-sm-1 w-100' style='min-width:max-content;'>
                    <thead>

                        <tr class='table-dark'>
                            <th scope='col'>BRANCH</th>
                            <th scope='col'>TOTAL</th>
                            <th scope='col'>IN</th>
                            <th scope='col'>OUT</th>
                        </tr>
                    </thead>
                    <tbody id='E2S2_table'>

                    </tbody>
                </table>


            </div>
            <div class='card-footer' id='E2S2_OVERALL'>
                <table class='table table-dark-subtle table-stripped-columns'>
                    <thead>
                        <tr>
                            <th>TOTAL</th>
                            <th>IN</th>
                            <th>OUT</th>
                            <th>OUT %</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id='E2S2_TOTAL'></td>
                            <td id='E2S2_IN'></td>
                            <td id='E2S2_OUT'></td>
                            <td id='E2S2_OUT_PER'></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class='card my-4 shadow' id='E3S2_details'>
            <h5 class='card-header bg-info-subtle'> E3(O18)</h5>
            <div class='card-body d-none d-sm-flex  row gx-2 justify-content-center year' id='E3S2'></div>
            <div class='card-body d-flex d-sm-none  row gx-2 justify-content-center year' id='E3S2_mb'>

                <table class='table w-100  table-bordered-2 table-striped mx-lg-2 mx-sm-1 ' style='min-width:max-content;'>
                    <thead>
                        <tr class='table-dark'>
                            <th scope='col'>BRANCH</th>
                            <th scope='col'>TOTAL</th>
                            <th scope='col'>IN</th>
                            <th scope='col'>OUT</th>
                        </tr>
                    </thead>
                    <tbody id='E3S2_table'>

                    </tbody>
                </table>


            </div>
            <div class='card-footer' id='E3S2_OVERALL'>
                <table class='table table-dark-subtle table-stripped-columns'>
                    <thead>
                        <tr>
                            <th>TOTAL</th>
                            <th>IN</th>
                            <th>OUT</th>
                            <th>OUT %</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id='E3S2_TOTAL'></td>
                            <td id='E3S2_IN'></td>
                            <td id='E3S2_OUT'></td>
                            <td id='E3S2_OUT_PER'></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>


    </main>
    <div class='modal fade' id='student_info' tabindex='-1' aria-labelledby='student_info' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
            <div class='modal-content'>
                <div class='modal-header bg-primary-subtle'>
                    <h1 class='modal-title fs-5  ' id='student_label'>Student Info</h1>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close' id='std_close'></button>
                </div>
                <div class='modal-body' id='records'>
                    <input type='text' class='form-control' id='id_number' placeholder='ID number'>
                    <p id='err_message'></p>
                    <div id='result' style='display:none'>
                        <div class='card my-4' id='datacard'>
                            <h3 class='card-header bg-info-subtle' id='year_branch'>
                            </h3>
                            <div class='card-body d-flex d-sm  row gx-2 justify-content-center' id='tdata'>
                                <?php include "loading.html"; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-primary' id='get_student_info'>Get Data</button>
                </div>
            </div>
        </div>
    </div>
    
<div class='modal fade ' id='out_student_list' tabindex='-1' aria-labelledby='myModal' aria-hidden='true'>
        <div class='modal-dialog modal-dialog-centered modal-dialog-scrollable'>
            <div class='modal-content'>
                <div class='modal-header bg-primary-subtle'>
                    <h1 class='modal-title fs-5'>GET STUDENT LIST</h1>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close' id='std_list_close'></button>
                </div>
                <div class='modal-body w-100'>
                    <select id="sel_year" class="form-control my-2">
                        <option value="select" selected>CHOOSE YEAR</option>
                        <option value="1">E1 (O20)</option>
                        <option value="2">E2 (O19)</option>
                        <option value="3">E3 (O18)</option>
                    </select>
                <div class='input-group my-1'>
                <input type="text" class="form-control" placeholder="Enter no of days" id='no_of_days'>
                <button class="btn btn-info" id="getdata">Get Data</button>
                </div>
                    <div class="justify-content-center"  style='display:none'id='spinner'>
                      <div class="spinner-border text-center justify-content-cente position-relative start-50" role="status">
                        <span class="visually-hidden mx-auto">Loading...</span>
                      </div>
                    </div>
                        <table style='display:none' id='student_list_table' class='table my-2 table-stripped  w-100'>
                        <thead>
                        <tr class='table-dark'>
                            <td>SID</td>
                            <td>SNAME</td>
                            <td>BRANCH</td>
                            <td>OUT DATE</td>
                        </tr></thead>
                        <tbody id='student_list'>
                        </tbody>
                    </table>
                    
                    </div>
                </div>
                <div class='modal-footer'>
                </div>
            </div>
        </div>

    
    </div>
   