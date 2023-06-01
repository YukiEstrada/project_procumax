import Swal from 'sweetalert2';

window.Swal = Swal;

// Page specific script
$(function () {
    $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
});
// hitung total price di cart
$('.quantity-input').on('change', function($this){
    var quantity = $(this).val();
    var price = $(this).closest('tr').find('.price-col').text();
    var subtotal = quantity * price.replaceAll('.', '');

    $(this).closest('tr').find('.subtotal-col').text(new Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3}).format(subtotal));

    var total = 0;
    $('.subtotal-col').each(function($this){
        total += parseInt($(this).text().replaceAll('.', ''));
    });

    $('.total-col').text(new Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3}).format(total));
    $('#total_price').val(total);


});

// print

shortcut.add("ctrl+p", function() {

    var printContents = document.getElementById("print-page").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
})

$(document).bind('keypress', 'ctrl+p', printDiv);
function printDiv(){
    var printContents = document.getElementById("print-page").innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;

}

// Form Registration Validate
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
})();

// Alert hide in 3 second
$(".alert").fadeTo(5000, 500).slideUp(500, function(){
    $(".alert").alert('close');
});




window.onload = function() {
    hideInput();
};
window.onload = function() {
    hideInput2();
};

// Level Access Null if not checked
$('form').submit(function () {
    if($('lvl-acc').is(':checked')) {
        $('lvl-acc').val(1);
    } else {
        $('lvl-acc').val(null);
    }
})

// Add Row MRV Form Po
function addRow() {
    var table = document.getElementById("mrvTable");    
    var row = table.insertRow();
    var iterationCell = row.insertCell(0);
    var itemNameCell = row.insertCell(1);
    var quantityCell = row.insertCell(2);
    var uomCell = row.insertCell(3);
    var priceCell = row.insertCell(4);
    var subtotalCell = row.insertCell(5);

    // Add Style Element to Td
    uomCell.classList.add("text-center");
    priceCell.classList.add("text-center");
    subtotalCell.classList.add("text-center");

    iterationCell.innerHTML = '2.';
    itemNameCell.innerHTML = 'Alat Pel';
    quantityCell.innerHTML = '<input type="number" name="qty" class="form-control" id="validationCustom" required>';
    uomCell.innerHTML = 'PCS';
    priceCell.innerHTML = '200.000';
    subtotalCell.innerHTML = '600.000';
}

// Sweet Alert
$(function () {
    $(document).on('click', '.welcome-alert', function(e) {
        e.preventDefault();
        Swal.fire(
            'Welcome Test',
            'Welcome to PO Admin',
            'success'
          )
    })
})
