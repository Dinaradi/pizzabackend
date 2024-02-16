<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
 *   @OA\Get(
 *     path="/api/categories",
 *     tags={"Category"},
 *     summary="Get list of users",
 *     @OA\Response(response="200", description="List of users")
 * )
 */

    public function index()
    {
        return Category::all();
    }


   /**
 * @OA\Post(
 *     path="/api/categories",
 *     tags={"Category"},
 *     summary="Create a new product category",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string", example="Category Name")
 *         )
 *     ),
 *     @OA\Response(response="201", description="Category created successfully"),
 *     @OA\Response(response="422", description="Unprocessable Entity, validation error")
 * )
 */

public function store(Request $request)
{
    $category = Category::create($request->all());
    return response()->json($category, 201);
}


    /**
     * Display the specified resource.
     */
    /**
     *Display the specified resource.
     *
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     tags={"Category"},
     *     summary="Display the specified product category",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the product category",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(response="200", description="The specified product category"),
     *     @OA\Response(response="404", description="Product category not found")
     * )
     */

     public function show($id)
     {
         $category = Category::findOrFail($id);
         return $category;
     }


     /**
 *Update the specified resource in storage.
 * @OA\Put(
 *     path="/api/categories/{id}",
 *     tags={"Category"},
 *     summary="Update the specified product category",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="ID of the product category",
 *         @OA\Schema(
 *             type="integer"
 *         )
 *     ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(property="name", type="string", example="New Category Name"),
 *                 required={"name"}
 *             )
 *         )
 *     ),
 *     @OA\Response(response="200", description="Product category updated"),
 *     @OA\Response(response="404", description="Product category not found")
 * )
 */

    public function update(Request $request, Category $category)
    {
        $category->update($request->all());
        return response()->json($category);
    }


 /**
     * Remove the specified resource from storage.
     */
    /**
     * @OA\Delete(
     *     path="/api/categories/{id}",
     *     tags={"Category"},
     *     summary="Delete a specific product category",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the product category",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Product category deleted successfully"),
     *     @OA\Response(response="404", description="Product category not found")
     * )
     */


    public function destroy(Category $categories)
    {
        $categories->delete();
        return response()->json(['message' => 'Category deleted successfully']);
    }
}
