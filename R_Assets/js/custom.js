$(document).ready(function() {


});


var data = [
    {
        "serialNumber": "1",
        "Cid": "254",
        "cName": "Tester",
        "loan_Start_Date": "2017-01-17",
        "loan_End_Date": "2018-01-17",
        "forClosure_Amount": "5526",
        "description": "Hello Tester "
    },
    {
        "serialNumber": "2",
        "Cid": "256",
        "cName": "Demo",
        "loan_Start_Date": "2016-01-13",
        "loan_End_Date": "2017-01-13",
        "forClosure_Amount": "258488",
        "description": "Hello Tester"
    },
    {
        "serialNumber": "3",
        "Cid": "258",
        "cName": "Aniket",
        "loan_Start_Date": "2015-01-14",
        "loan_End_Date": "2016-01-14",
        "forClosure_Amount": "36952",
        "description": "Hello Tester"
    },
    {
        "serialNumber": "4",
        "Cid": "255",
        "cName": "Credit",
        "loan_Start_Date": "2017-02-18",
        "loan_End_Date": "2018-02-18",
        "forClosure_Amount": "15643",
        "description": "Hello Tester"
    },
    {
        "serialNumber": "5",
        "Cid": "285",
        "cName": "Mate",
        "loan_Start_Date": "2016-11-12",
        "loan_End_Date": "2017-11-12",
        "forClosure_Amount": "25865",
        "description": "Hello Tester"
    }
];


$(function () {
    $('#table').bootstrapTable({
        data: data
    });
});



 function AddRupeeFormatter(value, row, index, field) {

    return '₹ ' +row.forClosure_Amount;
             
    }


    var $table = $('#table');

function getOrder() {
    return $table.bootstrapTable('getOptions').sortOrder 
        === 'asc' ? -1 : 1;
}

function AddRupeeSorter(a, b) {
    if (!a) return -1 * getOrder();
    if (!b) return 1 * getOrder();
    if (a < b) return -1;
    if (a > b) return 1;
    return 0;
}
/*
function AddRupeeSorter(a, b) {
    if (a < b) return 1;
    if (a > b) return -1;
    return 0;
}

*/
    function operateFormatter(value, row, index) {
        return [ 
            '<a class="preClose" href="javascript:void(0)" title="Pre Close">',
            '<i class="material-icons fnt20 clrthemes">close</i>',
            '</a> &nbsp;&nbsp; ',
            '<a class="BikeReceived" href="javascript:void(0)" title="Bike Received">',
            '<i class="material-icons  fnt20 clrthemes">directions_bike</i>',
            '</a>&nbsp;&nbsp;',
            '<a class="BikeSurrender" href="javascript:void(0)" title="Bike Surrender">',
            '<i class="material-icons  fnt24 clrthemes">motorcycle</i>',
            '</a>'
        ].join('');
    }

    window.operateEvents = {
        'click .preClose': function (e, value, row, index) {
            //alert('My Clicked row  is , row: ' + JSON.stringify(row));
            bootbox.confirm({
                            title: "Are you Sure want to ForeClose this Account",
                                message: "<h2 class='fnt22 fnt777'>Are You Sure Want to PreClose This Account ?<br><br>Customer Have to Pay Sum of <strong class='text-danger'>₹ "+row.forClosure_Amount+"</strong></h2>",
                                buttons: {
                                    confirm: {
                                        label: ' Confirm',
                                        className: 'btn-danger '
                                    },
                                    cancel: {
                                        label: 'Cancel',
                                        className: 'btn-default'
                                    }
                                },
                                callback: function (result) {
                                    
                                    console.log('This was logged in the callback: ' + result);
                                    if(result==true){
                                            alert('');
                                    }
                                }
                            });
        },
        'click .BikeReceived': function (e, value, row, index) {
            /*
            $('#table').bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            });
            */
           var foreclosureAmount= parseFloat(row.forClosure_Amount)+ parseFloat(5000);
           
            bootbox.confirm({
                                title: "Are you Sure want to ForeClose this Account",
                                message: "<h2 class='fnt22 fnt777'>Are You Sure Want to PreClose This Account  ?<br><br>Customer Have to Pay Sum of <strong class='text-danger'>₹ "+foreclosureAmount+"</strong></h2>",
                                buttons: {
                                    confirm: {
                                        label: ' Confirm',
                                        className: 'btn-danger '
                                    },
                                    cancel: {
                                        label: 'Cancel',
                                        className: 'btn-default'
                                    }
                                },
                                callback: function (result) {
                                    
                                    console.log('This was logged in the callback: ' + result);
                                    if(result==true){
                                            alert('');
                                    }
                                }
                            });

        },
        'click .BikeSurrender': function (e, value, row, index) {
            /*
            $('#table').bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            });
            */
            
          // var foreclosureAmount= parseFloat(row.forClosure_Amount)+ parseFloat(5000);
           
            bootbox.prompt({
                                 title: "Are you Sure want to ForeClose this Account",
                                 inputType:'number',
                                buttons: {
                                    confirm: {
                                        label: ' Confirm',
                                        className: 'btn-danger '
                                    },
                                    cancel: {
                                        label: 'Cancel',
                                        className: 'btn-default'
                                    }
                                },
                                callback: function (result) {
                                              //  console.log(result);
                                                //alert(result);
                                                var foreclosureAmount= parseFloat(row.forClosure_Amount)+ parseFloat(result); 
                                                bootbox.confirm({
                                                                    title: "Are you Sure want to ForeClose this Account",
                                                                    message: "<h2 class='fnt22 fnt777'>Are You Sure Want to PreClose This Account  ?<br><br>Customer Have to Pay Sum of <strong class='text-danger'>₹ "+foreclosureAmount+"</strong></h2>",
                                                                    buttons: {
                                                                        confirm: {
                                                                            label: ' Confirm',
                                                                            className: 'btn-danger '
                                                                        },
                                                                        cancel: {
                                                                            label: 'Cancel',
                                                                            className: 'btn-default'
                                                                        }
                                                                    },
                                                                    callback: function (result) {
                                                                        
                                                                        console.log('This was logged in the callback: ' + result);
                                                                        if(result==true){
                                                                                alert('');
                                                                        }
                                                                    }
                                                                });
                                            }
                            });

        }
    };



    $(".BikeSurrender").on("change click", function() {
        $('.bootbox-form .bootbox-input').attr("placeholder",'Add here How Much You want to charge extra from the User');
            //$('.bootbox-input-text').attr('placeholder','Add here How Much You want to charge extra from the User');

    });