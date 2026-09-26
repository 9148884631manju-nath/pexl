<!DOCTYPE html>
<?php

require_once __DIR__ . '/vendor/autoload.php';
use Phpxl\Pexl\ExcelReader;
 

require_once "inc/glob.php";
$r = new ExcelReader();


//$totheme = $r->htmltotheme("temps/headerwithpara.html");
//echo $totheme;


?>
<html lang="en" class="h-full bg-slate-100 font-sans">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HTML to Template Generator</title>
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- HTMX CDN -->
  <script src="https://unpkg.com/htmx.org@1.9.10"></script>
  <!-- FontAwesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- Google Fonts: Inter & JetBrains Mono -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brandBlue: {
              50: '#eff6ff',
              100: '#dbeafe',
              200: '#bfdbfe',
              500: '#3b82f6',
              600: '#2563eb',
              700: '#1d4ed8',
              800: '#1e40af',
              900: '#1e3a8a',
            },
            coolSlate: {
              50: '#f8fafc',
              100: '#f1f5f9',
              200: '#e2e8f0',
              300: '#cbd5e1',
              400: '#94a3b8',
              500: '#64748b',
              600: '#475569',
              700: '#334155',
              800: '#1e293b',
              900: '#0f172a',
            }
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            mono: ['"JetBrains Mono"', 'monospace'],
          }
        }
      }
    }
  </script>

  <style>
    /* Custom Scrollbar Styles */
    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    ::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }
    .custom-shadow {
      box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.05), 0 2px 6px -1px rgba(15, 23, 42, 0.03);
    }
  </style>
</head>
<body class="h-full text-coolSlate-800 flex flex-col bg-slate-100 antialiased selection:bg-brandBlue-500 selection:text-white">

  <header class="bg-white border-b border-coolSlate-200 px-6 py-3.5 flex items-center justify-between shrink-0 shadow-sm z-10">
    <div class="flex items-center space-x-3.5">
      <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brandBlue-600 to-indigo-600  flex items-center justify-center font-bold text-lg shadow-md shadow-brandBlue-500/20">
        PEXL
      </div>
      <div>
        <h1 class="font-bold text-coolSlate-900 text-base leading-tight flex items-center gap-2">
          HTML to Template Generator
          <span class="text-[11px] bg-brandBlue-50 text-brandBlue-600 border border-brandBlue-200 px-2 py-0.5 rounded-full font-mono font-medium">HTMX Engine</span>
        </h1>
        <p class="text-xs text-coolSlate-500">Transform HTML snippets into dynamic variable-bound templates</p>
      </div>
    </div>

    <!-- Header Actions -->
    <div class="flex items-center space-x-2.5 text-xs hidden">
      <button 
        onclick="loadSampleHTML()"
        class="bg-coolSlate-100 hover:bg-coolSlate-200 text-coolSlate-700 font-medium px-3.5 py-2 rounded-lg border border-coolSlate-200 transition flex items-center gap-1.5 shadow-sm">
        <i class="fa-solid fa-wand-magic-sparkles text-brandBlue-600"></i> Sample Demo
      </button>
      <button 
        onclick="clearAllFields()"
        class="bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200 px-3.5 py-2 rounded-lg font-medium transition flex items-center gap-1.5">
        <i class="fa-solid fa-trash-arrow-up"></i> Clear All
      </button>
    </div>
  </header>

  <main class="flex-1 p-4 lg:p-6">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 h-full">
      
      <!-- ========================================== -->
      <!-- COLUMN 1: Input Panel (HTML & Metadata)    -->
      <!-- ========================================== -->
      <section class="lg:col-span-4 bg-white border border-coolSlate-200 rounded-xl p-5 flex flex-col custom-shadow">
        
        <!-- Column Header -->
        <div class="flex items-center justify-between pb-3.5 border-b border-coolSlate-200 mb-4">
          <div class="flex items-center space-x-2.5">
            <span class="w-6 h-6 rounded-full bg-brandBlue-100 text-brandBlue-700 text-xs font-bold flex items-center justify-center border border-brandBlue-200">1</span>
            <h2 class="font-bold text-sm text-coolSlate-900 tracking-wide uppercase">Source & Metadata</h2>
          </div>
          <span class="text-xs text-coolSlate-500 font-mono bg-coolSlate-100 px-2 py-0.5 rounded border border-coolSlate-200" id="char-count">0 chars</span>
        </div>

        <!-- Form Elements -->
        <form 
          id="html-input-form"
          hx-post="generate.php?for=attr" 
        hx-target="#result-container" 
        hx-swap="innerHTML" 
          class="flex flex-col flex-1 space-y-4 min-h-0">
          
          <!-- Template Path Input -->
          <div>
            <label class="block text-xs font-semibold text-coolSlate-700 mb-1.5 flex items-center gap-1.5">
              <span>Template File Path</span>
              <i class="fa-solid fa-circle-info text-coolSlate-400 text-[11px]" title="Target file output destination path"></i>
            </label>
            <div class="relative">
              <span class="absolute left-3 top-2.5 text-coolSlate-400 text-xs font-mono">
                <i class="fa-regular fa-folder-open text-brandBlue-600"></i>
              </span>
              <input 
                type="text" 
                id="template_name"
                name="template_name" 
                placeholder="user-card"
                class="w-full bg-coolSlate-50 border border-coolSlate-200 rounded-lg pl-8 pr-3 py-2 text-xs text-coolSlate-800 font-mono placeholder-coolSlate-400 focus:outline-none focus:ring-2 focus:ring-brandBlue-500 focus:border-brandBlue-500 transition" />
            </div>
          </div>

          <!-- HTML Source Textarea -->
          <div class="flex-1 flex flex-col min-h-0">
            <label class="block text-xs font-semibold text-coolSlate-700 mb-1.5 flex justify-between items-center">
              <span>Raw HTML Code</span>
              <span class="text-[10px] text-coolSlate-400 font-mono">HTML5 Input</span>
            </label>
            <div class="relative flex-1 min-h-[260px]">
              <textarea 
                id="html_content"
                name="html_content" 
                placeholder="Paste your HTML code snippet here..." 
                oninput="updateCharCount()"
                class="w-full h-full bg-coolSlate-50 border border-coolSlate-200 rounded-lg p-3.5 text-xs text-coolSlate-900 font-mono placeholder-coolSlate-400 focus:outline-none focus:ring-2 focus:ring-brandBlue-500 focus:border-brandBlue-500 transition resize-none leading-relaxed"></textarea>
            </div>
          </div>

          <!-- Column 1 Footer Action Buttons -->
          <div class="pt-2 flex items-center space-x-3 shrink-0">
            <button 
              type="submit" 
              class="flex-1 bg-brandBlue-600 hover:bg-brandBlue-700 text-white font-semibold py-2.5 px-4 rounded-lg text-xs tracking-wider transition shadow-md shadow-brandBlue-500/20 flex items-center justify-center gap-2">
              <i class="fa-solid fa-bolt"></i>
              <span>Parse Attributes</span>
            </button>
            <button 
              type="button" 
              onclick="resetSourceField()"
              class="border border-coolSlate-300 hover:bg-coolSlate-100 text-coolSlate-700 font-medium py-2.5 px-4 rounded-lg text-xs transition flex items-center justify-center gap-1.5">
              <i class="fa-solid fa-rotate-left"></i>
              <span>Reset</span>
            </button>
          </div>
        </form>
      </section>

      <!-- ========================================== -->
      <!-- COLUMN 2: Attribute Builder & Custom Attrs -->
      <!-- ========================================== -->
      <section class="lg:col-span-4 bg-white border border-coolSlate-200 rounded-xl p-5 flex flex-col custom-shadow">
        
        <!-- Column Header & Controls -->
        <div class="flex items-center justify-between pb-3.5 border-b border-coolSlate-200 mb-4">
          <div class="flex items-center space-x-2.5">
            <span class="w-6 h-6 rounded-full bg-brandBlue-100 text-brandBlue-700 text-xs font-bold flex items-center justify-center border border-brandBlue-200">2</span>
            <h2 class="font-bold text-sm text-coolSlate-900 tracking-wide uppercase">Set Attributes to Template</h2>
          </div>
          <span class="text-xs text-coolSlate-600 font-mono bg-coolSlate-100 border border-coolSlate-200 px-2 py-0.5 rounded font-medium" id="attr-badge">0 Active</span>
        </div>

        

       <!-- Attributes Container List -->
        <form class="flex-1 flex flex-col min-h-0" hx-post="generate.php?for=theme" 
        hx-target="#result-container_tmp" 
        hx-swap="innerHTML" >
          <div 
            id="result-container" 
            class="flex-1 min-h-0 overflow-y-auto space-y-3 pr-1">
            
            <!-- Default Sample Attribute Card -->          

          </div>
          <!-- Upper Action Buttons Row -->
        <div class="grid grid-cols-2 gap-3 mb-3.5">
          <button 
            type="button"
            onclick="hprepend('result-container')"
            class="border border-brandBlue-200 bg-brandBlue-50/50 hover:bg-brandBlue-100 text-brandBlue-700 font-semibold py-2 px-3 rounded-lg text-xs transition flex items-center justify-center gap-1.5 shadow-sm">
            <i class="fa-solid fa-plus text-brandBlue-600"></i>
            <span>Add New Attr</span>
          </button>
          
          <button 
            type="submit"
            class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-3 rounded-lg text-xs tracking-wider transition flex items-center justify-center gap-1.5 shadow-md shadow-indigo-500/20">
            <i class="fa-solid fa-gears"></i>
            <span>Generate Template</span>
          </button>
        </div>
</form><script>
            htms='<div class="grid grid-cols-1 md:grid-cols-2 gap-5"><div><b>Label </b><input class="w-full border border-amber-700/60 rounded-none px-3 py-2 text-stone-800 placeholder-amber-700/50 focus:outline-none focus:ring-1 focus:ring-amber-800" name="label[]" value="" placeholder="label" /></div><div><b>Value</b><input class="w-full border border-amber-700/60 rounded-none px-3 py-2 text-stone-800 placeholder-amber-700/50 focus:outline-none focus:ring-1 focus:ring-amber-800" name="value[]" value="" placeholder="value" /></div></div>';
            function hprepend(cid){ const container = document.getElementById(cid);
  if (container) {
    container.insertAdjacentHTML('afterend', htms);
  }}
          </script>

      </section>

      <!-- ========================================== -->
      <!-- COLUMN 3: Live Template Result & Preview   -->
      <!-- ========================================== -->
      <section class="lg:col-span-4 bg-white border border-coolSlate-200 rounded-xl flex flex-col custom-shadow overflow-hidden">
        
        <!-- Editor Header Bar -->
        <div class="bg-coolSlate-900 border-b border-coolSlate-800 px-4 py-3 flex items-center justify-between shrink-0">
          <div class="flex items-center space-x-3">
            <h2 class="font-bold text-sm text-white tracking-wide font-mono flex items-center gap-2">
              <i class="fa-solid fa-square-poll-vertical text-brandBlue-400"></i>
              <span>Template Result</span>
            </h2>
            
            <!-- View Mode Switcher -->
            <div class="flex hidden bg-coolSlate-800 rounded-md p-0.5 border border-coolSlate-700 text-[11px]">
              <button 
                onclick="switchView('code')" 
                id="tab-code" 
                class="px-2.5 py-1 rounded font-medium text-white bg-brandBlue-600 transition">
                Code
              </button>
              <button 
                onclick="switchView('preview')" 
                id="tab-preview" 
                class="px-2.5 py-1 rounded font-medium text-coolSlate-400 hover:text-white transition">
                Preview
              </button>
            </div>
          </div>

          <!-- Output Toolbar -->
          <div class="flex hidden items-center space-x-2">
            <button 
              onclick="copyToClipboard()" 
              id="copy-btn"
              class="bg-coolSlate-800 hover:bg-coolSlate-700 text-coolSlate-200 border border-coolSlate-700 px-2.5 py-1 rounded text-xs font-mono transition flex items-center gap-1.5">
              <i class="fa-regular fa-copy text-brandBlue-400"></i>
              <span>Copy</span>
            </button>
            <button 
              onclick="downloadTemplate()"
              class="bg-coolSlate-800 hover:bg-coolSlate-700 text-coolSlate-200 border border-coolSlate-700 px-2.5 py-1 rounded text-xs font-mono transition flex items-center gap-1.5">
              <i class="fa-solid fa-download text-emerald-400"></i>
              <span>Save</span>
            </button>
          </div>
        </div>

        <!-- Editor Workspace Code Output Pane -->
        <div id="result-container_tmp" class="flex-1 p-4 relative font-mono text-xs overflow-auto bg-coolSlate-950 ">
          <div class="flex space-x-4 h-full">
            
            <pre class="flex-1 text-coolSlate-200 whitespace-pre-wrap leading-relaxed overflow-x-auto"><code id="result-output" class="text-blue-200">// Result will appear here...
// Paste raw HTML in Column 1 and click "Generate Template" to compile.</code></pre>
          </div>
        </div>

        <!-- Visual HTML Preview Pane (Hidden by default) -->
        <div id="pane-preview" class="hidden flex-1 p-4 overflow-auto bg-slate-50 min-h-[300px]">
          <div id="preview-frame" class="bg-white p-4 rounded-lg border border-coolSlate-200 shadow-sm min-h-full">
            <p class="text-xs text-coolSlate-400 italic">Generate template to render visual output...</p>
          </div>
        </div>

        <!-- IDE Footer Status Bar -->
        <div class="bg-coolSlate-900 border-t border-coolSlate-800 px-4 py-2 text-[11px] font-mono text-coolSlate-400 flex items-center justify-between shrink-0">
          <div class="flex items-center space-x-3 hidden">
            <span class="flex items-center gap-1.5 text-emerald-400 font-medium" id="status-indicator">
              <i class="fa-solid fa-circle text-[7px]"></i> Ready
            </span>
            <span>HTML5 Compiler</span>
          </div>
          <span id="output-stats" class="hidden">0 lines | 0 bytes</span>
        </div>

      </section>

    </div>
  </main>

  <script>
    
  </script>
</body>
</html>