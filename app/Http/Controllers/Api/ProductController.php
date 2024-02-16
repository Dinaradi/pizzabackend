<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProductRequest;


class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Get all products for REST API",
     *     operationId="index",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
     * )
     */
    public function index()
    {
        // Start with a query builder for the Product model
        $query = Product::query();

        // Check if a categoryId query parameter is present
        if ($categoryId = request('categoryId')) {
            // Apply a filter to the query based on the categoryId
            $query->where('categoryId', $categoryId);
        }

        // Execute the query to get the filtered or all products
        $products = $query->get();

        // Optionally, if you want to load the category relationship for each product
        // and assuming each product belongs to a category, you can use the `with` method:
        // $products = $query->with('category')->get();

        return response()->json(['products' => $products]);
    }


 /**
 * @OA\Post(
 *     path="/api/products",
 *     tags={"Products"},
 *     summary="Add a new product to the store",
 *     operationId="addProduct",
 *     @OA\RequestBody(
 *         description="Product object that needs to be added to the store",
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "price", "status", "types", "sizes", "rating"},
 *             @OA\Property(property="name", type="string", example="Example Product Name"),
 *             @OA\Property(property="image", type="string", format="binary", description="Product image file"),
 *             @OA\Property(property="price", type="number", format="float", example=99.99),
 *             @OA\Property(property="types", type="string", example="Example Type"),
 *             @OA\Property(property="sizes", type="string", example="Example Size"),
 *             @OA\Property(property="rating", type="integer", format="int32", example=5),
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Product successfully added",
 *         @OA\JsonContent(
 *             @OA\Property(property="success", type="boolean", example=true),
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="message", type="string", example="Product added successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input"
 *     )
 * )
 */
public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'image' => 'required',
        'name' => 'required|max:255',
        'types' => 'required',
        'sizes' => 'required',
        'rating' => 'required',
        'price' => 'required|numeric',
    ]);

    // Create and save the new product
    $product = new Product();
    $product->image = $validatedData['image'];
    $product->name = $validatedData['name'];
    $product->price = $validatedData['price'];
    $product->types = $validatedData['types'];
    $product->sizes = $validatedData['sizes'];
    $product->rating = $validatedData['rating'];

    $product->save();

    // Return the response
    return response()->json([
        'success' => true,
        'id' => $product->id,
        'message' => 'Product added successfully'
    ], 201);
}



/**
 * @OA\Get(
 *     path="/api/products/{id}",
 *     tags={"Products"},
 *     summary="Get a specific product from the store",
 *     description="This endpoint retrieves a specific product by its ID.",
 *     operationId="show",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the product to retrieve",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Product successfully retrieved",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="Example Product Name"),
 *             @OA\Property(property="price", type="number", format="float", example=99.99),
 *             @OA\Property(property="image", type="string", example="url/to/product/image"),
 *             @OA\Property(property="types", type="array", @OA\Items(type="string"), example={"type1", "type2"}),
 *             @OA\Property(property="sizes", type="array", @OA\Items(type="string"), example={"small", "medium", "large"}),
 *             @OA\Property(property="rating", type="number", format="float", example=4.5)
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Product not found"
 *     )
 * )
 */

 public function show($id)
 {
     $product = Product::find($id);

     if (!$product) {
         return response()->json(['message' => 'Product not found'], 404);
     }

     return response()->json($product);
 }


   /**
 * @OA\Put(
 *     path="/api/products/{id}",
 *     tags={"Products"},
 *     summary="Update an existing product in the store",
 *     description="This endpoint updates an existing product identified by its ID with the provided data.",
 *     operationId="update",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the product to update",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         description="Product object that needs to be updated in the store",
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name", "price", "status"},
 *             @OA\Property(property="name", type="string", example="Updated Product Name"),
 *             @OA\Property(property="price", type="number", format="float", example=150.00),
 *             @OA\Property(property="image", type="string", example="url/to/updated/product/image"),
 *             @OA\Property(property="types", type="array", @OA\Items(type="string"), example={"type1", "type2"}),
 *             @OA\Property(property="sizes", type="array", @OA\Items(type="string"), example={"medium", "large"}),
 *             @OA\Property(property="rating", type="number", format="float", example=4.8)
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Product successfully updated",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="Updated Product Name"),
 *             @OA\Property(property="price", type="number", format="float", example=150.00),
 *             @OA\Property(property="image", type="string", example="url/to/updated/product/image"),
 *             @OA\Property(property="types", type="array", @OA\Items(type="string"), example={"type1", "type2"}),
 *             @OA\Property(property="sizes", type="array", @OA\Items(type="string"), example={"medium", "large"}),
 *             @OA\Property(property="rating", type="number", format="float", example=4.8)
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input"
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Product not found"
 *     )
 * )
 */

 public function update(Request $request, $id)
 {
     $product = Product::find($id);

     if (!$product) {
         return response()->json(['message' => 'Product not found'], 404);
     }

     $validatedData = $request->validate([
         'name' => 'required|max:255',
         'price' => 'required|numeric',
         'image' => 'sometimes|string',
         'types' => 'sometimes|array',
         'sizes' => 'sometimes|array',
         'rating' => 'sometimes|numeric',
     ]);

     $product->update($validatedData);

     return response()->json($product);
 }


   /**
 * @OA\Delete(
 *     path="/api/products/{id}",
 *     tags={"Products"},
 *     summary="Delete a specific product from the store",
 *     description="This endpoint deletes a specific product by its ID.",
 *     operationId="delete",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID of the product to delete",
 *         required=true,
 *         @OA\Schema(
 *             type="integer",
 *             format="int64"
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Product successfully deleted",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Product deleted successfully")
 *         )
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Product not found"
 *     )
 * )
 */

 public function destroy($id)
 {
     $product = Product::find($id);

     if (!$product) {
         return response()->json(['message' => 'Product not found'], 404);
     }

     $product->delete();

     return response()->json(['message' => 'Product deleted successfully']);
 }

}
