const ComplexNumberComponent = {
	template: `
		<div class="input-group">
			<input class="form-control text-right" v-model="number.real">
			<div class="input-group-prepend input-group-append">
				<span class="input-group-text">+</span>
			</div>
			<input class="form-control text-right" v-model="number.imaginary">
			<div class="input-group-prepend input-group-append">
				<span class="input-group-text">i</span>
			</div>
		</div>
	`,
	model: {
		prop: 'number',
		event: 'input'
	},
	props: {
		'number': ComplexNumber
	}
};

const OperatorComponent = {
	template: `
		<select class="form-control text-center" :value="operator" @change="$emit('change', $event.target.value)">
			<option v-for="option in options" :value="option.action">{{option.operator}}</option>
		</select>
	`,
	model: {
		prop: 'operator',
		event: 'change'
	},
	props: {
		'operator': String
	},
	data() {
		return {
			options: [
				{action: 'add', operator: '+'},
				{action: 'subtract', operator: '-'},
				{action: 'multiply', operator: '*'},
				{action: 'divide', operator: '/'},
			]
		}
	}
};

const app = new Vue({
	el: '#app',
	data() {
		return {
			numbers: [new ComplexNumber(0, 0), new ComplexNumber(0, 0)],
			operators: ['add']
		}
	},
	components: {
		'operator': OperatorComponent,
		'complex-number': ComplexNumberComponent
	},
	computed: {
		result() {
			let result = this.numbers[0];
			for (let i = 1; i < this.numbers.length; i++) {
				result = result[this.operators[i - 1]](this.numbers[i]);
			}
			return result;
		}
	},
	methods: {
		addNumber() {
			this.numbers.push(new ComplexNumber(0, 0));
			this.operators.push('add');
		},
		removeNumber() {
			this.numbers.pop();
			this.operators.pop();
		}
	}
});