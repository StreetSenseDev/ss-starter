const ExampleComponent1 = {

    init () {
        var allDivs = document.querySelectorAll('div');
        console.log(allDivs);
        if (!allDivs.length)
            return;

        allDivs.forEach((element, index) => {

            this.update(element, index);
            //console.log(index, element);
        });
    },

    update (element, index) {

        // do something here
        console.log(element, index + ' is working...');

    }

};

export default ExampleComponent1;