/*
This Site is developed By
Name: Rahul Gupta
Contact : 8581843939
Website: rahulkrgupta.netlify.app
*/
function updateTotalCount() {
    let total = 0;
    // Select all input fields in the 'Score of the institute' column
    const scoreInputs = document.querySelectorAll('input[type="number"][name]:not(#total_count)');
    // Sum up the values of each input
    scoreInputs.forEach(input => {
        total += parseFloat(input.value) || 0; // Add value or 0 if empty
    });
    // Update the total count field with three decimal places
    document.getElementById('total_count').value = total.toFixed(3);
}
// $("#performance-submit").click(function(){
//     const task = $("#performance-form").attr("action");
    
// })
// $.notify("hii","success");
$("#performance-submit").click(function (e) {
    e.preventDefault();
    $("#performance-form").validate();
    if ($("#performance-form").valid()) {
      let task = $("#performance-form").attr("action");
      let data = $("#performance-form").serialize();
      let total_count = $("#total_count").val();
      $.ajax({
        url: "required/master_process?task=" + task,
        type: "POST",
        data: data + '&total_count=' + total_count,
        success: function (data) {
          let obj = JSON.parse(data);
            $.notify(obj.msg, obj.status);
            setTimeout(() => {
              location.reload();
            }, 1000);
        },
      });
    }
  });
  
$("#performance-update").click(function (e) {
    e.preventDefault();
    $("#performance-update-form").validate();
    if ($("#performance-update-form").valid()) {
      let task = $("#performance-update-form").attr("action");
      let data = $("#performance-update-form").serialize();
      let total_count = $("#total_count").val();
      $.ajax({
        url: "required/master_process?task=" + task,
        type: "POST",
        data: data + '&total_count=' + total_count,
        success: function (data) {
          let obj = JSON.parse(data);
            $.notify(obj.msg, obj.status);
            setTimeout(() => {
              location.reload();
            }, 1000);
        },
      });
    }
  });

//   $('#example1').DataTable({
//     "lengthMenu": [[10, 25, 50,100,500, -1], [10, 25, 50,100,500, "All"]]
// } );

$(document).ready(function(){  
  // $('#example1').DataTable({
  //     scrollX: true,
  //     paging: true,
  //     responsive: true
  // });
  // $('#example2').DataTable({
  //     scrollX: true,
  //     paging: true,
  //     responsive: true
  // });
  // $('#example3').DataTable({
  //     scrollX: true,
  //     paging: true,
  //     responsive: true
  // });
  // $('#example4').DataTable({
  //     scrollX: true,
  //     paging: true,
  //     responsive: true
  // });


  // $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
  //   let target = $(e.target).attr("data-bs-target"); // Get the target tab
  //   $(target).find('.dataTables').each(function () {
  //     $(this).DataTable().columns.adjust(); // Adjust columns
  //   });
  // });
  // $(document).ready(function () {
    // Initialize the first visible table only
    // $('#example1').DataTable(
    //   {
    //     scrollX: true,
    //         paging: true,
    //         responsive: true
    //   }
    // );

    // // Handle tab switching
    // $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
    //   const target = $(e.target).attr("data-bs-target");
    //   const table = $(target).find('table.dataTable');
      
    //   if (!$.fn.DataTable.isDataTable(table)) {
    //     table.DataTable(); // Initialize DataTable for the first time
    //   } else {
    //     table.DataTable().columns.adjust(); // Adjust columns
    //   }
    // });
  // });
// })
// $(document).ready(function () {
  // Initialize the first visible table
  // $('#example1').DataTable({
  //     scrollX: true,
  //     paging: true,
  //     responsive: true
  // });

  // Handle tab switching
  $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
      const target = $(e.target).attr("data-bs-target"); // Get the active tab content
      const table = $(target).find('table.dataTable'); // Find the table inside the tab

      if (table.length > 0) {
          // If the table is not already initialized
          if (!$.fn.DataTable.isDataTable(table)) {
              table.DataTable({
                  scrollX: true,
                  paging: true,
                  responsive: true
              });
          } else {
              // If the table is already initialized, adjust its columns
              table.DataTable().columns.adjust();
          }
      }
  });
});
