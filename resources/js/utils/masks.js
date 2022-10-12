import { formatCurrency, parseCurrency } from '@brazilian-utils/brazilian-utils';


const masks = {
    currency: (value) => formatCurrency(parseCurrency(value))
}

export default masks