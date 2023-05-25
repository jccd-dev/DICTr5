const formdata = (el) => {
    const formData = {};
    const elements = el.querySelectorAll("select, input, textarea");

    elements.forEach((e) => {
        formData[e.name] = e.value;
    });

    return formData;
};

export default formdata;
