<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

    <style type="text/css">
        table th,
        table td {
            width: 100px;
            padding: 5px;
            border: 1px solid #ccc;
        }

        .selected {
            background-color: #666;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="row col-3">


        <button class="btn btn-primary btn-block mt-5" disabled>Guardar Cambios</button>
        <table class="mt-5" id="tblLocations" cellpadding="0" cellspacing="0" border="1">
            <tr>
                <th>ID </th>
                <th>Location</th>
                <th>Preference</th>
            </tr>
            <tr>
                <td>1</td>
                <td> Goa</td>
                <td>7</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mahabaleshwar</td>
                <td>8</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Kerala</td>
                <td>9</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Kashmir</td>
                <td>10</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Ooty</td>
                <td>11</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Simla</td>
                <td>12</td>
            </tr>
            <tr>
                <td>7</td>
                <td>Manali</td>
                <td>13</td>
            </tr>
            <tr>
                <td>8</td>
                <td>Darjeeling</td>
                <td>14</td>
            </tr>
            <tr>
                <td>9</td>
                <td>Nanital</td>
                <td>15</td>
            </tr>
        </table>
    </div>
    <script type="text/javascript">
        $(function() {
            $(document).on('click' ,'button' , function(){
                $("button").prop('disabled', true);
            });
            $("#tblLocations").sortable({
                items: 'tr:not(tr:first-child)',
                cursor: 'pointer',
                axis: 'y',
                dropOnEmpty: false,
                start: function(e, ui) {
                    ui.item.addClass("selected");
                },
                stop: function(e, ui) {
                    let reordenamiento = [];
                    $("button").prop('disabled', false);
                    ui.item.removeClass("selected");
                    $(this).find("tr").each(function(index) {

                        if (index > 0) {
                            const id = $(this).find("td").eq(0).html();
                            $(this).find("td").eq(2).html(index);
                            const preferencia = $(this).find("td").eq(2).html();
                            reordenamiento.push({
                                idtema: id,
                                preferencia: preferencia
                            });

                        }
                    });
                    console.log(reordenamiento);
                }
            });

        });
    </script>
</body>

</html>