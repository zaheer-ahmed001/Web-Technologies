var data = [
    {
        "address":"../Session1/RES/logo.png"
    },
    {
        "address":"../Session1/RES/img1.jpg"
    },
    {
        "address":"RES/img.png"
    },
    {
        "address":"RES/img1.png"
    },
    {
        "address":"RES/img2.png"
    }
];

for(var i=0;i<data.length;i++)
{
    document.getElementById('addimg').innerHTML += `
        <div class="col-3 p-2">
                <img src="${data[i].address}" alt="" class="w-100" height="200">
            </div>
    `;
}