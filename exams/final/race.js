$(function() {

    createModal();

    $("button.add").on("click", function(e) {
        //console.log(e);
        $("#modalBoxAdd").css("display", "block");
    })
    
    $("button.edit").on("click", function(e) {
        //console.log(e);
        $("#modalBoxEdit").css("display", "block");
    })

    $("button.save").on("click", function(e) {
        //var typeId = $("#typeId").val();

        var pageData = {
            "raceId": $("#raceId").val(),
            "raceDate": $("#raceDate").val(),
            "startTime": $("#startTime").val(),
            "code": $("#code").val(),
            "loc": $("#loc").val(),
        };

        $.ajax({
            type: "POST",
            url: "index.php",
            dataType: "json",
            contentType: "application/json",
            data: JSON.stringify(pageData),
            success: function(data, status) {
                console.log("Printing Data", data);
            },
            error: function(err) {
                console.log("Didn't get data", err);
            },
            complete: function() {
                // Do this last
                $("#modalBox").css("display", "none");
            }
        });
    })

    // Make a global variable
    var pagesData;

    $.ajax({
        type: "GET",
        url: "index.php",
        dataType: "json",
        success: function(data, status) {
            pagesData = data;
            console.log("Setting up the Data", pagesData);

            for (var p in pagesData) {
                var page = pagesData[p];

                $("#pages table tbody").append(
                    $("<tr>")
                    .append($("<td>")
                        .html(page.raceId))
                    .append($("<td>")
                        .html(page.raceDate))
                    .append($("<td>")
                        .html(page.startTime))
                    .append($("<td>")
                        .html(page.loc))
                    .append(
                    $("<button class='edit action'>")                       //The button to edit
                    .append($("<img>")
                        .attr("src", "img/salon-actions-edit.png"))
                        )
                    .append(                                                //The button to delete
                        $("<button class='archive action'>")
                    .append($("<img>")
                        .attr("src", "img/salon-actions-archive.png"))
                        )
                    .append(                                                //The button to preview
                    $("<button class='preview action'>")
                    .append($("<img>")
                        .attr("src", "img/salon-actions-preview.png"))
                        ))
                    }

                },
            error: function(err) {
                console.log("Didn't get data", err);
            }
        });

})

function createModal() {
    // Get the modal

    // Get the button that opens the modal
    var btn = document.getElementById("openButton");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    var span2 = document.getElementsByClassName("close2")[0];
    
    // When the user clicks on <span> cancel, close the modal
    span.onclick = function() {
        $("#modalBoxAdd").css("display", "none");
    }
    span2.onclick = function() {
        $("#modalBoxEdit").css("display", "none");
    }
    
    var modal = document.getElementById('modalBox');

}