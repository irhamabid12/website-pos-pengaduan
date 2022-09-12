
$(document).ready(function(){
    $('#cek-resi').on('click', function() {

    $.ajax({
        url:'https://api.binderbyte.com/v1/track?api_key=4274887b56b5a86804ad66344b8b9bb4dbefc66f0d648e36faf8b0f837c58bee',
        type:'get',
        dataType:'json',
        // headers:{'Access-Control-Allow-Origin':'http://127.0.0.1:8000'},

        data:{
            'courier':'pos',  
            'awb':$('#awb_input').val()
        },
        success:function(result){
            if(result.status == 200){
                let resi = result.data;
                console.log(resi);
                $('#resi-status').html(
                    `<div class="col-md-8">
                    <div></div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <th scope="row">`+ "Status" +`</th>
                            <td>` + resi.summary.status + `</td>
                        </tr>
                        <tr>
                            <th scope="row">`+ "Layanan" +`</th>
                            <td>` + resi.summary.courier + `</td>
                        </tr>
                        <tr>
                            <th scope="row">`+ "Pengirim" +`</th>
                            <td>` + resi.summary.shipper + `</td>
                        </tr>
                        <tr>
                            <th scope="row">`+ "Asal" +`</th>
                            <td>` + resi.summary.origin + `</td>
                        </tr>
                        <tr>
                            <th scope="row">`+ "Penerima" +`</th>
                            <td>` + resi.summary.receiver + `</td>
                        </tr>
                        <tr>
                            <th scope="row">`+ "Tanggal Kirim" +`</th>
                            <td>` + resi.summary.date + `</td>
                        </tr>
                        <tr>
                            <th scope="row">`+ "Tanggal Kirim" +`</th>
                            <td>` + resi.history.desc + `</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>`
                )
            } else{
                $('#resi-result').html(`
                <div class = "col">
                <h1 class = "text-center"> ` + result.message +`</h1>
                </div>`)
            }
        }
    })
    }) 
})