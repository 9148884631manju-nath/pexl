<?php
require_once __DIR__ . '/openspout/vendor/autoload.php';
require_once __DIR__ . '/vendor/autoload.php';
use Phpxl\Pexl\ExcelReader;
 

require_once "inc/glob.php";
$r = new ExcelReader();


//$totheme = $r->htmltotheme("temps/headerwithpara.html");
//echo $totheme;


?>
<div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
    
    <!-- LEFT COLUMN: INPUT FORM -->
    <div class="space-y-6">
      <h1 class="text-xl font-medium text-amber-800/80">HTML to Template Generator</h1>
      
      <form 
        hx-post="generate.php" 
        hx-target="#result-container" 
        hx-swap="innerHTML" 
        class="space-y-6"
      >
        <!-- Text Input Field -->
        <div>
          <input 
            type="text" 
            name="template_name" 
            placeholder="Ex. temps/mytemplate.html"
            required
            class="w-full border border-amber-700/60 rounded-none px-3 py-2 text-stone-800 placeholder-amber-700/50 focus:outline-none focus:ring-1 focus:ring-amber-800"
          />
        </div>

        <!-- Textarea Field -->
        <div>
          <textarea 
            name="html_content" 
            rows="20"
            required 
            placeholder="Paste HTML here..."
            class="w-full border border-amber-700/60 rounded-none p-3 text-stone-800 placeholder-amber-700/50 focus:outline-none focus:ring-1 focus:ring-amber-800 resize-y"
          ></textarea>
        </div>

        <!-- Submit Button -->
        <div>
          <button 
            type="submit" 
            class="border border-amber-700/60 px-4 py-2 text-amber-800/80 hover:bg-amber-50 active:bg-amber-100 transition-colors rounded-none font-normal"
          >
            Generate Template
          </button>
        </div>
      </form>
    </div>

    <!-- RIGHT COLUMN: RESULT VIEW -->
    <div class="space-y-6">
      <h2 class="text-xl font-medium text-amber-800/80">Template Result</h2>
      
      <!-- Code Result Display (Dark Blue Background) -->
      <div 
        id="result-container" 
        class="w-full h-[80vh] border border-amber-700/60 bg-[#0f172a] text-white font-mono p-4 overflow-auto rounded-none"
      >
        <!-- Output will be injected here via htmx -->
        <span class="text-slate-500">// Result will appear here...</span>
      </div>
    </div>

  </div>
