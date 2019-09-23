$('#submit-btn').on('click', function(e) {
    e.preventDefault();
    $('.loader').css('display', 'block');
    $('.overlay').css('display', 'block');
    $(this).val('Please wait ...').attr('disabled','disabled');
    $('.booking-form').submit();
});

let wrapper = $(".row-container");
let addButton = $(".add-form-field");
let row = 2;

$(addButton).on('click', function() {
    $(wrapper).append(`
    <tr>
        <td class="fieldlist">
            <label for="length__${row}">Length</label>
            <input id="length__${row}" type="text" name="parcels[${row}][length]">
            <span>cm</span>
        </td>
        <td class="fieldlist">
            <label for="width__${row}">Width</label>
            <input id="width__${row}" type="text" name="parcels[${row}][width]">
            <span>cm</span>
        </td>
        <td class="fieldlist">
            <label for="height__${row}">Height</label>
            <input id="height__${row}" type="text" name="parcels[${row}][height]">
            <span>cm</span>
        </td>
        <td class="fieldlist">
            <label for="weight__${row}">Weight</label>
            <input id="weight__${row}" type="text" name="parcels[${row}][weight]">
            <span>kg</span>
        </td>
        <td>
            <button type="button" title="Remove parcel" class="k-button delete-row">
                <i class="fas fa-trash-alt"></i>
            </button>
        </td>
    </tr>
    `);
    row++;
});

$(wrapper).on('click', '.delete-row', function() {
    $(this).parent('td').parent('tr').remove();
});