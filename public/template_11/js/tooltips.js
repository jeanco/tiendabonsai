

const icono = document.querySelector('#pivot');
const tooltip = document.querySelector('#tooltip');

/*const calcularPosicionTooltip = () => {
	// Calculamos las coordenadas del icono.
	const x = icono.offsetLeft;
	const y = icono.offsetTop;

	// Calculamos el tamaño del tooltip.
	const anchoTooltip = tooltip.clientWidth;
	const altoTooltip = tooltip.clientHeight;

	// Calculamos donde posicionaremos el tooltip.
	const izquierda = x - (anchoTooltip / 2) + 15;
	const arriba = y - altoTooltip - 20;

	tooltip.style.left = `${izquierda}px`;
	tooltip.style.top = `${arriba}px`;
};*/

window.addEventListener('load', () => calcularPosicionTooltip());
window.addEventListener('resize', () => calcularPosicionTooltip());

icono.addEventListener('mouseenter', () => {
	tooltip.classList.add('activo');
	calcularPosicionTooltip();
});

let timer;
icono.addEventListener('mouseleave', () => {
	timer = setTimeout(() => {
		tooltip.classList.remove('activo');
	}, 500);
});

tooltip.addEventListener('mouseenter', () => clearTimeout(timer));
tooltip.addEventListener('mouseleave', () => tooltip.classList.remove('activo'));







//////




const icono__ = document.querySelector('.pivot_');
const tooltip__ = document.querySelector('#tooltip__');

const calcularPosicionTooltip__ = () => {
	// Calculamos las coordenadas del icono__.
	const x = icono__.offsetLeft;
	const y = icono__.offsetTop;

	// Calculamos el tamaño del tooltip.
	const anchoTooltip = tooltip__.clientWidth;
	const altoTooltip = tooltip__.clientHeight;

	// Calculamos donde posicionaremos el tooltip.
	const izquierda = x - (anchoTooltip / 2) + 290;
	const arriba = y - altoTooltip - 20;

	tooltip__.style.left = `${izquierda}px`;
	tooltip__.style.top = `${arriba}px`;
};

window.addEventListener('load', () => calcularPosicionTooltip__());
window.addEventListener('resize', () => calcularPosicionTooltip__());

icono__.addEventListener('mouseenter', () => {
	tooltip__.classList.add('activo');
	calcularPosicionTooltip__();
});

let timer__;
icono__.addEventListener('mouseleave', () => {
	timer__ = setTimeout(() => {
		tooltip__.classList.remove('activo');
	}, 500);
});

tooltip__.addEventListener('mouseenter', () => clearTimeout(timer__));
tooltip__.addEventListener('mouseleave', () => tooltip__.classList.remove('activo'));



const icono_ = document.querySelector('#pivot_');
const tooltip_ = document.querySelector('#tooltip_');

const calcularPosicionTooltip_ = () => {
	// Calculamos las coordenadas del icono_.
	const x = icono_.offsetLeft;
	const y = icono_.offsetTop;

	// Calculamos el tamaño del tooltip.
	const anchoTooltip = tooltip_.clientWidth;
	const altoTooltip = tooltip_.clientHeight;

	// Calculamos donde posicionaremos el tooltip.
	const izquierda = x - (anchoTooltip / 2) + 120;
	const arriba = y - altoTooltip - 20;

	tooltip_.style.left = `${izquierda}px`;
	tooltip_.style.top = `${arriba}px`;
};

window.addEventListener('load', () => calcularPosicionTooltip_());
window.addEventListener('resize', () => calcularPosicionTooltip_());

icono_.addEventListener('mouseenter', () => {
	tooltip_.classList.add('activo');
	calcularPosicionTooltip_();
});

let timer_;
icono_.addEventListener('mouseleave', () => {
	timer_ = setTimeout(() => {
		tooltip_.classList.remove('activo');
	}, 500);
});

tooltip_.addEventListener('mouseenter', () => clearTimeout(timer_));
tooltip_.addEventListener('mouseleave', () => tooltip_.classList.remove('activo'));


////