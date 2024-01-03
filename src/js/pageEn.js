


fetch(urlx + "src/api/json/text_box_EN.json").then(data => {return data.json()}).then(text_box => {
    const data_text = text_box;
    const objects = Object.keys(data_text.page);

    objects.forEach(titles => {
        document.getElementById(titles).innerHTML = data_text["page"][titles];
    });
});

fetch(urlx + "src/api/json/system.json").then(dataSystem => {return dataSystem.json()}).then(system_box => {
    const data_system = system_box;
    const links = Object.keys(data_system.links);
    const images = Object.keys(data_system.images);

    links.forEach(href => {
        document.getElementById(href).setAttribute("href" ,  data_system["links"][href]);
    });
    images.forEach(src => {
        document.getElementById(src).setAttribute("src" , urlx + data_system["images"][src]);
    });
});