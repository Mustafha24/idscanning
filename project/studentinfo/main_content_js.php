
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script src="script.js"></script>
<script>
$(document).ready(function(){

            $.ajax({
                url:'fetch.php',
                type:'get',
                datatype:'json',
                success:function(data) {
                    data=JSON.parse(data);
                    // alert(typeof(data));
                        $.each(data, function(key, value) {
                    console.log(value);
                        $(`#E${value.year}S2`).append(

                                `<table class='table shadow table-bordered-2 border-dark-subtle table-striped-columns mx-lg-2 mx-sm-1 ' style='min-width:max-content;max-width:25ch' >
                                        <thead>
                                        <tr class='table-dark '><td colspan='3' class='text-center'>${value.branch}</td></tr>
                                            <tr >
                                              <th  class='table-secondary'scope='col' >TOTAL</th>
                                              <th class='table-success'scope='col'>IN</th>
                                              <th class='table-danger'scope='col'>OUT</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td class='table-secondary'id='E${value.year}S2_${value.branch}_TOTAL'>${value.total_count}</td>
                                              <td  class='table-success'id='E${value.year}S2_${value.branch}_IN'>${value.in_count}</td>
                                              <td class='table-danger'id='E${value.year}S2_${value.branch}_OUT'>${value.out_count}</td>
                                            </tr>
                                            
                                          </tbody>
                                    </table>`
                                    );      
                        $(`#E${value.year}S2_table`).append(
                            ` <tr class='text-center'>
                                <td  class='table-teritiary'id='E${value.year}S2_${value.branch}_branch_mb'>${value.branch}</td>
                                  <td class='table-warning' id='E${value.year}S2_${value.branch}_TOTAL_mb'>${value.total_count}</td>
                                  <td  class='table-success'id='E${value.year}S2_${value.branch}_IN_mb'>${value.in_count}</td>
                                  <td class='table-danger'id='E${value.year}S2_${value.branch}_OUT_mb'>${value.out_count}</td>
                                </tr>`
                        )
                    });
                   
                      $('#loading').fadeOut();
                    }
            });
            
 // -----------------------------------------------------------------
            $.getJSON(
                    'total_records.php',
                    function(data) {
                
                        $.each(data, function(key, val) {
                            // console.log(val);
                            $(`#E${val.year}S2_TOTAL`).html(val.total_count);
                            $(`#E${val.year}S2_IN`).html(val.in_count);
                            $(`#E${val.year}S2_OUT`).html(val.out_count);
                            $(`#E${val.year}S2_OUT_PER`).html(((val.out_count / val.total_count) * 100).toFixed(1) + '%');
                        });


                    });


// ------------------------------------------
            $('#get_student_info').click(function() {
                var sid = $('#id_number').val()
                // console.log(sid);
                $.ajax({
                    url: 'get_student_info.php',
                    type: 'POST',
                    data: {
                        id: sid
                    },
            
                    dataType: 'JSON',
                    success: function(data) {
                         $("#loading").fadeOut();
                        // console.log(data)
                        if (!data.Status) {
                                fetchdata()
                                
                                $.each(data, function(key, value) {
                                    $('#year_branch').html(`${value.SNAME} E${value.YEAR} ${value.BRANCH}`)
                                    $('#result').slideDown();
                                })
                    

                        } else {
                            $('#err_message').html('INVALID ID').fadeIn(1500).fadeOut(1000)
                            $('#id_number').effect('shake', {
                                distance: 10
                            });
                            
                        }
                    }

                })

            })

// ----------------------------------------------------------------------
            function fetchdata() {
                var sid = $('#id_number').val()
                $.ajax({
                    url: 'student_info.php',
                    type: 'POST',
                    data: {
                        id: sid
                    },
                    success: function(data) {
                        if(data=='No data'){
                            console.log('No data')
                        }
                        else{
                        
                        $('#result').slideDown()
                        $('#tdata').html(data)
                        }
                    }
                })
            }
            
// ------------------------------------------------------------

            $('#std_close').on('click', function() {
                $('#student_info').on('hidden.bs.modal', function() {
                    $('#year_branch').html('Student Details');
                    $('#tdata').empty();
                    $('#datacard').slideUp();
                    $('#id_number').val('');
                });
            });
            // -------------------------------------------------
        $('#getdata').click(function(){
            $("#spinner").fadeIn();
            $.ajax({
                url:'QRPAGE/allout.php',
                type:'post',
                data:{year:$('#sel_year').val(),days:$('#no_of_days').val()},
                dataType:'json',
                beforeSend:function(){
                    $('#student_list').empty();
                },
                success:function(data){
                $("#spinner").slideUp();
                $.each(data,function(key,value){
                 $('#student_list').append(`<tr class='text-center'>
                                <td>${value.ID_NUMBER}</td>
                                <td style='font-size:14px;padding:auto;width:15ch'>${value.SNAME}</td>
                                <td>${value.BRANCH}</td>
                                <td style='font-size:14px;padding:0;'>${value.OUT_TIME}</td>
                                </tr>`)
                })
                $("#student_list_table").slideDown(1000);
                }
            })
        })
        $('#std_list_close').on('click',()=>{
            $('student_list_table').slideUp();
        })

});
</script>
    