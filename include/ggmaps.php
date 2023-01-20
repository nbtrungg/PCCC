<html lang="en">

<head>
    <title>GG Maps API Demo</title>
    <style type="text/css">
        #map {
            width: 98%;
            height: 500px;
            margin: 1%;
            border: 2px solid red;
        }
        .diachi{
            text-align: center;
            padding-top: 50px;
            color: red;
            font-size: 1rem;
            font-weight: bold;

        }
        #floating-panel {
            width: 100%;
            margin-top: 10px;
            position: absolute;
/*            top: 50px;
            left: 10px;*/
            z-index: 5;
            padding: 5px;
            text-align: center;
            font-family: "Roboto", "sans-serif";
            line-height: 30px;
            /*padding-left: 200px;*/
            /* width: 400px; */
        }
    </style>
</head>

<body>
    <h3 class="diachi">VỊ TRÍ CÁC CỬA HÀNG</h3>
    <div id="floating-panel">
        <input id="auto_search" type="text" style="width: 400px;" />
    </div>
    <div id="map"></div>

    <script>
        //Tạo biểu tượng địa chỉ các PCCC(Thêm function)
        function CenterControl(controlDiv, map) {
            const controlUI = document.createElement("div");
            controlUI.style.backgroundColor = "#fff";
            controlUI.style.border = "2px solid #fff";
            controlUI.style.borderRadius = "3px";
            controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
            controlUI.style.cursor = "pointer";
            controlUI.style.marginBottom = "22px";
            controlUI.style.marginTop = "5px";
            controlUI.style.textAlign = "center";
            controlUI.title = "Ấn vào để đi đến PCCC Lê Văn Việt";
            controlDiv.appendChild(controlUI);
            const controlText = document.createElement("div");
            controlText.style.color = "rgb(25,25,25";
            controlText.style.fontFamily = "Roboto,Arial,sans-serif";
            controlText.style.fontSize = "16px";
            //controlText.style.lineHeight="38px";
            controlText.style.paddingLeft = "5px";
            controlText.style.paddingRight = "5px";
            controlText.innerHTML = "PCCC LVV";
            controlUI.appendChild(controlText);
            controlUI.addEventListener("click", () => {
                map.setCenter(cck = {
                    lat: 10.844930,
                    lng: 106.788307
                });
            });
        }
        //Tạo biểu tượng địa chỉ các CCK(Thêm function)
        function CenterControl1(controlDiv, map) {
            const controlUI = document.createElement("div");
            controlUI.style.backgroundColor = "#fff";
            controlUI.style.border = "2px solid #fff";
            controlUI.style.borderRadius = "3px";
            controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
            controlUI.style.cursor = "pointer";
            controlUI.style.marginBottom = "22px";
            controlUI.style.marginTop = "5px";
            controlUI.style.marginLeft = "5px";
            controlUI.style.textAlign = "center";
            controlUI.title = "Ấn vào để đi đến PCCC Man Thiện";
            controlDiv.appendChild(controlUI);
            const controlText = document.createElement("div");
            controlText.style.color = "rgb(25,25,25";
            controlText.style.fontFamily = "Roboto,Arial,sans-serif";
            controlText.style.fontSize = "16px";
            //controlText.style.lineHeight="38px";
            controlText.style.paddingLeft = "5px";
            controlText.style.paddingRight = "5px";
            controlText.innerHTML = "PCCC MT";
            controlUI.appendChild(controlText);
            controlUI.addEventListener("click", () => {
                map.setCenter(cck = {
                    lat: 10.847340,
                    lng: 106.787220
                });
            });
        }
        //Tạo biểu tượng địa chỉ các CCK(Thêm function)
        function CenterControl2(controlDiv, map) {
            const controlUI = document.createElement("div");
            controlUI.style.backgroundColor = "#fff";
            controlUI.style.border = "2px solid #fff";
            controlUI.style.borderRadius = "3px";
            controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
            controlUI.style.cursor = "pointer";
            controlUI.style.marginBottom = "22px";
            controlUI.style.marginTop = "5px";
            controlUI.style.marginLeft = "5px";
            controlUI.style.textAlign = "center";
            controlUI.title = "Ấn vào để đi đến PCCC Võ Văn Ngân";
            controlDiv.appendChild(controlUI);
            const controlText = document.createElement("div");
            controlText.style.color = "rgb(25,25,25";
            controlText.style.fontFamily = "Roboto,Arial,sans-serif";
            controlText.style.fontSize = "16px";
            //controlText.style.lineHeight="38px";
            controlText.style.paddingLeft = "5px";
            controlText.style.paddingRight = "5px";
            controlText.innerHTML = "PCCC VVN";
            controlUI.appendChild(controlText);
            controlUI.addEventListener("click", () => {
                map.setCenter(cck = {
                    lat: 10.850700,
                    lng: 106.764640
                });
            });
        }

        var map;
        var InfoObj = [];
        var centerCords = {
            lat: 10.844930,
            lng: 106.788307
        };
        //Vị trí các marker
        var markerOnMap = [

            {
                placeName: "PCCC Man Thiện",
                link: "https://www.google.com/maps/place/Circle+K+Man+Thi%E1%BB%87n/@10.8473976,106.7849233,17z/data=!3m1!4b1!4m5!3m4!1s0x3175271373a7e1a3:0xc80e4a95dd5b037!8m2!3d10.8473923!4d106.7871174?hl=vi-VN",
                LatLng: [{
                    lat: 10.847340,
                    lng: 106.787220,
                }],

            }, {
                placeName: "PCCC Lê Văn Việt",
                link: "https://www.google.com/maps/place/Circle+K+-+L%C3%AA+V%C4%83n+Vi%E1%BB%87t/@10.8455294,106.7916316,17z/data=!3m1!4b1!4m5!3m4!1s0x317527158d1c8d25:0x4e51445b6b0444ac!8m2!3d10.8455241!4d106.7938257?hl=vi-VN",
                LatLng: [{
                    lat: 10.844930,
                    lng: 106.788307,
                }],

            }, {
                placeName: "PCCC K Võ Văn Ngân",
                link: "https://www.google.com/maps/place/Circle+K+V%C3%B5+V%C4%83n+Ng%C3%A2n/@10.8495358,106.7695915,17z/data=!3m1!4b1!4m5!3m4!1s0x3175270ab8e20337:0x65b216a30f527786!8m2!3d10.8494863!4d106.7717797?hl=vi-VN",
                LatLng: [{
                    lat: 10.850700,
                    lng: 106.764640,
                }],

            },
        ];
        //hàm Xoá dữ kiệu infowindow
        function closeOtherInfo() {
            if (InfoObj.length > 0) {
                InfoObj[0].set("marker", null);
                InfoObj[0].close();
                InfoObj[0].length = 0;
            }

        }

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 17,
                center: centerCords,
                streetViewControl: true,
                overviewMapControl: true,
                //Ẩn các biểu tượng mặc định của maps
                // zoomControl: false,
                // fullscreenControl: false,
                // mapTypeControl: true,
            });
            //icon hình circle k
            var icon = {
                url: "https://scontent.fsgn2-1.fna.fbcdn.net/v/t39.30808-6/286393647_1642861042759945_1933598562433691968_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=730e14&_nc_ohc=MALSn0ow7zAAX_7YxR3&_nc_ht=scontent.fsgn2-1.fna&oh=00_AT8evq2DKRJTmJvUk3jKnZAg7tT4Rc_ze_AnrHPFdRyckg&oe=62A1BBD2", // url
                scaledSize: new google.maps.Size(50, 50), // size
            };
            for (var i = 0; i < markerOnMap.length; i++) {
                var contentString = '<h3>' + markerOnMap[i].placeName + '</h3>' +
                    '<a href=' + markerOnMap[i].link + ' ' + 'target="_blank">' + "Xem bản đồ lớn hơn" + '</a>';
                const marker = new google.maps.Marker({
                    position: markerOnMap[i].LatLng[0],
                    map: map,
                    icon: icon,
                });
                //Tạo 1 cửa sổ thông tin (info window)
                const infowindow = new google.maps.InfoWindow({
                    content: contentString,
                });
                //tạo sự kiện click cho marker
                marker.addListener('click', function() {
                    closeOtherInfo();
                    infowindow.open(marker.get('map'), marker);
                    InfoObj[0] = infowindow;
                });
                //Hàm tự động gợi ý địa điểm khi search
                var autocomplete = new google.maps.places.Autocomplete(document.getElementById("auto_search"));
                autocomplete.addListener('place_changed', function() {
                    //xét vị trí để cập nhật lại map
                    place = autocomplete.getPlace();
                    map.setCenter(place.geometry.location);
                    //khai báo 1 marker mới
                    const marker1 = new google.maps.Marker({
                        map: map,

                    });
                    //gán marker vào vị trí tìm kiếm
                    marker1.setPosition(place.geometry.location);
                    console.log(autocomplete.getPlace());
                })

            }
            //Tạo biểu tượng địa chỉ các cck(thiết lập control)
            const CenterControlDiv = document.createElement("div");
            CenterControl(CenterControlDiv, map);
            map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(CenterControlDiv);
            //Tạo biểu tượng địa chỉ các cck(thiết lập control)
            const CenterControlDiv1 = document.createElement("div");
            CenterControl1(CenterControlDiv1, map);
            map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(CenterControlDiv1);
            //Tạo biểu tượng địa chỉ các cck(thiết lập control)
            const CenterControlDiv2 = document.createElement("div");
            CenterControl2(CenterControlDiv2, map);
            map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(CenterControlDiv2);


        };
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC-_zkeeCaFn0atOWoYWmurnNL9hjR69mY&libraries=places&callback=initMap" async></script>
</body>

</html>