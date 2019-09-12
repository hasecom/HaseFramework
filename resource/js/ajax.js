export function ajax(getPath,getType,getData){
$.ajax({
    url: getPath,
    type: getType,
    dataType: "json",
    data:getData
})
    .done((data) => {
        console.log(data);
    })
    .fail((data) => {

    })
    .always((data) => {

    });
}

