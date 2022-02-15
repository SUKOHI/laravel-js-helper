const helperData = @json($helper_data);

if(!window.route) {

    window.route = (name, ...parameters) => {

        const targetRoute = helperData.route.find(route => {

            return (route.name === name);

        });

        if(targetRoute) {

            let index = 0;
            const pattern = /\{([\w\-]+)\}/g;
            const baseUri = targetRoute.uri;
            const uri = baseUri.replace(pattern, () => {

                const value = parameters[index];
                index++;

                return value;

            });

            return '/'+ uri;

        }

        return '';

    };

}

if(!window.constant) {

    window.constant = (key, defaultValue = null) => {

        return helperData.constants[key] || defaultValue;

    };

}

if(!window.dd) {

    window.dd = (...parameters) => {

        console.log(parameters);

    };

}