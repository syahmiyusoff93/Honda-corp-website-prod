 

<script src="zata_da/plug-in/jquery-3.3.1.min.js" type="text/javascript"></script>

<input type="text" name="tester" value="<?php echo htmlspecialchars('{"max": 1000, "min": 300}'); ?>">

hi
<script>
$(async function(){
        let database = [{"id":"38","_title":"","_model":"","_price":"","_manufacturingYr":"","_registrationDate":"","_bodyType":"","_drivenWheel":"","_engineCapacity":"","_transmission":"","_mileage":"","_color":"","_warranty":"","_location":"","_status":"1","_date":"2021-05-27 18:18:07","_mainImg":"210527.a8dgo1h9trl.jpg","_gallery":"[\"210527.a8dh5hghe4e.jpg\",\"210527.a8dgsmqfp5e.jpg\",\"210527.14857dgge3pe1.jpg\",\"210527.3cofmtgpf69d.jpg\",\"210527.148580m6ts54q.jpg\",\"210527.14858bc8lh9m7.jpg\"]","_featured":"1"},{"id":"40","_title":"sdf","_model":"asd","_price":"350.00","_manufacturingYr":"","_registrationDate":"asdff","_bodyType":"","_drivenWheel":"","_engineCapacity":"","_transmission":"","_mileage":"","_color":"","_warranty":"asd","_location":"","_status":"1","_date":"2021-05-27 20:23:08","_mainImg":"210527.a90f5dea0s9.jpg","_gallery":"[\"210527.10r1ejd8ptn.jpg\",\"210527.3d05c871i8q5.jpg\"]","_featured":"1"},{"id":"45","_title":"","_model":"","_price":"","_manufacturingYr":"","_registrationDate":"","_bodyType":"","_drivenWheel":"","_engineCapacity":"","_transmission":"","_mileage":"","_color":"","_warranty":"","_location":"","_status":"1","_date":"2021-05-27 20:28:14","_mainImg":"210527.bdoc3ibcjt152.jpg","_gallery":"[\"210527.bdoc3pme8osqg.png\"]","_featured":"1"},{"id":"46","_title":"","_model":"","_price":"","_manufacturingYr":"","_registrationDate":"","_bodyType":"","_drivenWheel":"","_engineCapacity":"","_transmission":"","_mileage":"","_color":"","_warranty":"","_location":"","_status":"1","_date":"2021-05-27 20:28:33","_mainImg":"210527.3oi6p3ihhd5so2.jpg","_gallery":"[\"210527.bdokf93gs2360.jpg\",\"210527.bdokfar4114t6.jpg\"]","_featured":"1"},{"id":"39","_title":"ewqe","_model":"eqw","_price":"ewq","_manufacturingYr":"eqw","_registrationDate":"eqw","_bodyType":"ewq","_drivenWheel":"eqw","_engineCapacity":"eqw","_transmission":"eqw","_mileage":"eqw","_color":"eqw","_warranty":"qwe","_location":"eqw","_status":"1","_date":"2021-05-27 20:19:23","_mainImg":"210527.3d1e3s8qehnb.jpg","_gallery":"[\"210527.3d1e3oqmd2r3.jpg\",\"210527.10rd73843h7.jpg\",\"210527.14aemkok9nshj.jpg\"]","_featured":"0"},{"id":"41","_title":"","_model":"","_price":"","_manufacturingYr":"","_registrationDate":"","_bodyType":"","_drivenWheel":"","_engineCapacity":"","_transmission":"","_mileage":"","_color":"","_warranty":"","_location":"","_status":"1","_date":"2021-05-27 20:23:37","_mainImg":"210527.14aet44t9sssk.jpg","_gallery":"[\"210527.a94elrlc2fr.jpg\",\"210527.3d1ereiotrbn.jpg\",\"210527.3d1er1narps7.jpg\",\"210527.3d1erbk02d3f.jpg\",\"210527.3d1er9la8iml.jpg\"]","_featured":"0"},{"id":"42","_title":"","_model":"","_price":"","_manufacturingYr":"","_registrationDate":"","_bodyType":"","_drivenWheel":"","_engineCapacity":"","_transmission":"","_mileage":"","_color":"","_warranty":"","_location":"","_status":"1","_date":"2021-05-27 20:27:10","_mainImg":"210527.3d43h5hm5frl.jpg","_gallery":"[\"210527.a9cafat17hh.jpg\"]","_featured":"0"},{"id":"43","_title":"","_model":"","_price":"","_manufacturingYr":"","_registrationDate":"","_bodyType":"","_drivenWheel":"","_engineCapacity":"","_transmission":"","_mileage":"","_color":"","_warranty":"","_location":"","_status":"1","_date":"2021-05-27 20:27:22","_mainImg":"210527.3d44q1rfa4ck.jpg","_gallery":"[\"210527.14bbh81fdrqil.jpg\",\"210527.14bbhbh1ci9at.jpg\",\"210527.14bbhfsmcl8hl.jpg\"]","_featured":"0"},{"id":"44","_title":"","_model":"","_price":"","_manufacturingYr":"","_registrationDate":"","_bodyType":"","_drivenWheel":"","_engineCapacity":"","_transmission":"","_mileage":"","_color":"","_warranty":"","_location":"","_status":"1","_date":"2021-05-27 20:27:33","_mainImg":"210527.3d46j5ldh5tj.jpg","_gallery":"[\"210527.14bc69a4rom5k.jpg\",\"210527.3d46ioetj4oi.jpg\",\"210527.3d46iojaglj2.jpg\"]","_featured":"0"},{"id":"47","_title":"","_model":"","_price":"","_manufacturingYr":"","_registrationDate":"","_bodyType":"","_drivenWheel":"","_engineCapacity":"","_transmission":"","_mileage":"","_color":"","_warranty":"","_location":"","_status":"1","_date":"2021-05-27 20:28:46","_mainImg":"210527.14beca6fj6mi0.jpg","_gallery":"[\"210527.14becg5h43bt7.jpg\",\"210527.3d4d79eirbl5.jpg\",\"210527.3d4d72mr0tga.jpg\"]","_featured":"0"}],
            jsoninfo = {"title":{"name":"Title"},"model":{"name":"Model"},"price":{"name":"Price (RM)"},"manufacturingYr":{"name":"Manufacturing Year"},"registrationDate":{"name":"Registration Date"},"bodyType":{"name":"Body Type","opt":["Convertible","Coupe","Hatchback","Mini SUV","MPF","Pickup Truck","Saloon","Sedan","Sports Car","SUV","Van","Wagon"]},"drivenWheel":{"name":"Driven Wheel","opt":["FWD"]},"engineCapacity":{"name":"Engine Capacity (L)"},"transmission":{"name":"Transmission","opt":["Automatic"]},"mileage":{"name":"Mileage (km)"},"color":{"name":"Colour","opt":["White","Green","Gray","Blue","Silver","Red","Black"]},"warranty":{"name":"Warranty (Months)"},"location":{"name":"Location"},"status":{"name":"Publish"},"featured":{"name":"Featured"}},
            keys = Object.keys(jsoninfo);
            keys = Object.keys(jsoninfo);
        let filters = { 
            priceR: $('[name="tester"]').val()
        };  

        let parse = '';

        let out = database.filter( row => {
            
            return Object.keys(filters).every(key => { 
                if(key == 'priceR') {
                    parse = JSON.parse(filters.priceR);
                    return row._price > parse.min && row._price < parse.max
                }else if(key == 'mileR') {
                    parse = JSON.parse(filters.priceR);
                    return row._price > filters[key].min && row._price < filters[key].max
                }else if(key == 'priceR') {
                    parse = JSON.parse(filters.priceR);
                    return row._price > filters[key].min && row._price < filters[key].max
                }else{
                    return filters[key] === row[key]
                } 
            });
        }) 
        console.log('result', out)
})
</script>