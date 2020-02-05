export class Form {
    makeCollapse() {
        document.querySelectorAll('.field-type-collapse .field-type-card header').forEach((header) => {
            header.addEventListener('click', (event) => {
                
                this.findAncestor(header, 'field-type-collapse').querySelectorAll('.field-type-card').forEach(card => {
                    card.classList.remove('active');
                });

                header.parentNode.classList.add('active');
            }, false);
        });
    }

    findAncestor (el, cls) {
        while ((el = el.parentElement) && !el.classList.contains(cls));
        return el;
    }
}