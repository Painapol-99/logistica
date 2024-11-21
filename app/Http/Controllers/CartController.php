
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CartController extends Controller
{
    protected $cart;

    public function __construct()
    {
        $this->cart = session()->get('cart', []);
    }

    public function add(Request $request)
    {
        $product = Producto::find($request->productId);
        if ($product) {
            $this->cart[$product->id] = [
                'product' => $product,
                'quantity' => $request->quantity
            ];
            session()->put('cart', $this->cart);
            return response()->json(['message' => 'Producto añadido a la cesta']);
        }
        return response()->json(['message' => 'Producto no encontrado'], 404);
    }

    public function update(Request $request)
    {
        if (isset($this->cart[$request->productId])) {
            $this->cart[$request->productId]['quantity'] = $request->quantity;
            session()->put('cart', $this->cart);
            return response()->json(['message' => 'Cantidad del producto actualizada']);
        }
        return response()->json(['message' => 'Producto no encontrado en la cesta'], 404);
    }

    public function index()
    {
        return response()->json($this->cart);
    }
}