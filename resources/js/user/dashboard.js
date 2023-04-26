import {
    regions,
    provinces,
    cities,
    barangays,
} from "select-philippines-address";

// regions().then((region) => console.log(region));

const regionSelect = document.querySelector('#region');
const provinceSelect = document.querySelector("#province")
const municipalitiesSelect = document.querySelector('#municipality')
const barangaySelect = document.querySelector('#barangay')

const setOptions = (data, elementForm, getter, selected = "", parentSelected = "") => {
    let code = "";

    Array.from(data).forEach(objData => {
        let optionElement = document.createElement('option')

        if (selected) {
            if (selected === objData[`${getter}_name`]) {
                optionElement.setAttribute("selected", true)
                code = objData[`${getter}_code`]
            } else {
                optionElement.removeAttribute("selected")
            }
        }

        optionElement.textContent = objData[`${getter}_name`]
        optionElement.setAttribute("value", objData[`${getter}_name`])

        elementForm.appendChild(optionElement)
    })

    return code;
}

const getDataValues = () => {
    let regionDataValue = document.querySelector('#region').dataset.value;
    let provinceDataValue = document.querySelector('#province').dataset.value;
    let municipalityDataValue = document.querySelector('#municipality').dataset.value;
    let barangayDataValue = document.querySelector('#barangay').dataset.value;

    return {
        regionDataValue,
        provinceDataValue,
        municipalityDataValue,
        barangayDataValue
    };
};

let codeValues = {
    regionCode: "",
    provinceCode: "",
    municipalityCode: "",
    barangayCode: "",
};

(async() => {
    let { regionDataValue, provinceDataValue, municipalityDataValue, barangayDataValue } = getDataValues();

    const region = await regions();
    if (!regionDataValue) {
        let regionCode = setOptions(region, regionSelect, "region")
        codeValues.regionCode = regionCode;

        return
    }

    let regionCode = setOptions(region, regionSelect, "region", regionDataValue);
    codeValues.regionCode = regionCode;

    let province = await provinces(regionCode);
    let provinceCode = setOptions(province, provinceSelect, 'province', provinceDataValue);
    codeValues.provinceCode = provinceCode;

    let municipality = await cities(provinceCode);
    let municipalityCode = setOptions(municipality, municipalitiesSelect, 'city', municipalityDataValue);
    codeValues.municipalityCode = municipalityCode;

    let barangay = await barangays(municipalityCode);
    let barangayCode = setOptions(barangay, barangaySelect, 'brgy', barangayDataValue);

    codeValues.barangayCode = barangayCode;
})();

regionSelect.addEventListener("change", async (event) => {
    let region = await regions()
    let regionObj = region.find((region) => region.region_name === event.target.value)

    codeValues.regionCode = regionObj.region_code

    let province = await provinces(codeValues.regionCode);
    removeElement(provinceSelect.children)
    removeElement(municipalitiesSelect.children)
    removeElement(barangaySelect.children)
    setOptions(province, provinceSelect, 'province')
})

provinceSelect.addEventListener("change", async (event) => {
    let province = await provinces(codeValues.regionCode);
    let provinceObj = province.find((province) => province.province_name === event.target.value)

    codeValues.provinceCode = provinceObj.province_code

    let city = await cities(provinceObj.province_code);
    removeElement(municipalitiesSelect.children)
    removeElement(barangaySelect.children)
    setOptions(city, municipalitiesSelect, 'city')
})

municipalitiesSelect.addEventListener("change", async (event) => {
    let city = await cities(codeValues.provinceCode);
    let cityObj = city.find((city) => city.city_name === event.target.value)

    codeValues.cityCode = cityObj.city_code

    let barangay = await barangays(cityObj.city_code);
    removeElement(barangaySelect.children)
    setOptions(barangay, barangaySelect, 'brgy')
})

const removeElement = (elements) => Array.from(elements).map((element) => element.remove())
