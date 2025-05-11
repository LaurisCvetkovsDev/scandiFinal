import { useDataStore } from "../store";

const Cart = () => {
  const cart = useDataStore((state) => state.cart);

  return (
    <div className="container mt-4">
      <h1 className="mb-4">Cart has {cart.length} items</h1>

      {cart.map((product, index) => (
        <div className="row border p-3 mb-3" key={index}>
          <div className="col-md-4 d-flex flex-column justify-content-center">
            <h4>{product.name}</h4>

            {product.attributes.map((attr) => (
              <div key={attr.name} className="mb-2">
                <strong>{attr.name}:</strong>{" "}
                {attr.items.map((item) => (
                  <span key={item.id}>{item.value}</span>
                ))}
              </div>
            ))}

            <div className="mt-2">
              {product.prices.map((price, i) => (
                <div key={i}>
                  <strong>Price:</strong> {price.currencySymbol}
                  {price.amount}
                </div>
              ))}
            </div>
          </div>

          <div className="col-md-5">
            <img
              src={product.gallery[0].url}
              alt={product.name}
              className="img-fluid"
            />
          </div>
        </div>
      ))}
    </div>
  );
};

export default Cart;
