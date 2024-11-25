    <?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateNftsTable extends Migration
    {
        public function up()
        {
            Schema::create('nfts', function (Blueprint $table) {
                $table->id();
                $table->string('nama_nft'); 
                $table->string('file');
                $table->string('foto'); 
                $table->text('deskripsi')->nullable(); 
                $table->foreignId('kategori_id')->constrained('kategoris')->onDelete('cascade'); 
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
                $table->decimal('harga_awal', 15, 2); 
                $table->decimal('harga_akhir', 15, 2)->nullable(); 
                $table->enum('status', ['available', 'sold', 'auction'])->default('available');
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('nfts');
        }
    }
